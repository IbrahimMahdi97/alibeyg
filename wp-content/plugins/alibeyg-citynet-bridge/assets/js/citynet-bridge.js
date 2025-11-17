/**
 * CityNet Bridge Script v2
 *
 * This script bridges the custom Alibeyg search widget with CityNet's Vue.js app
 * by making CityNet perform its own search with the custom widget's parameters.
 *
 * Flow:
 * 1. Custom widget stores search payload in sessionStorage
 * 2. This script reads payload and converts to CityNet format
 * 3. Stores data in CityNet's expected locations (localStorage + URL)
 * 4. Triggers CityNet's internal search mechanism
 *
 * @package Alibeyg_Citynet_Bridge
 * @since 0.5.3
 */

(function() {
  'use strict';

  console.log('[CityNet Bridge] v2 Initializing...');

  /**
   * Convert custom widget payload to CityNet format
   */
  function convertToCitynetFormat(payload) {
    // The payload is already in CityNet's API format from the widget
    // Just ensure it has all required fields
    const citynetPayload = {
      Lang: payload.Lang || 'FA',
      TravelPreference: payload.TravelPreference,
      TravelerInfoSummary: payload.TravelerInfoSummary,
      SpecificFlightInfo: payload.SpecificFlightInfo || { Airline: [] },
      OriginDestinationInformations: payload.OriginDestinationInformations,
      DeepLink: payload.DeepLink || 0
    };

    // Add CIP and Insurance if present
    if (payload.CIP) citynetPayload.CIP = true;
    if (payload.Insurance) citynetPayload.Insurance = true;

    return citynetPayload;
  }

  /**
   * Store search data in CityNet's expected locations
   */
  function storeCitynetSearchData(payload, params) {
    console.log('[CityNet Bridge] Storing data in CityNet format');

    // CityNet might read from these keys
    const citynetKeys = [
      'flightSearchData',
      'cn_flight_search',
      'citynet_search_data',
      'searchFlightData',
      'flightSearch'
    ];

    // Try storing in multiple locations to maximize compatibility
    citynetKeys.forEach(function(key) {
      try {
        localStorage.setItem(key, JSON.stringify(payload));
        sessionStorage.setItem(key, JSON.stringify(payload));
      } catch (e) {
        console.warn('[CityNet Bridge] Failed to store in ' + key);
      }
    });

    // Store params in a readable format
    try {
      localStorage.setItem('citynet_search_params', JSON.stringify(params));
      sessionStorage.setItem('citynet_search_params', JSON.stringify(params));
    } catch (e) {}
  }

  /**
   * Build URL hash for Vue Router
   */
  function buildVueRouterHash(params) {
    // Build hash route that Vue Router can read
    // Common patterns: #/flight or #/flight/search
    const queryParams = [];

    if (params.origin) queryParams.push('from=' + params.origin);
    if (params.destination) queryParams.push('to=' + params.destination);
    if (params.departureDate) queryParams.push('departDate=' + params.departureDate);
    if (params.returnDate) queryParams.push('returnDate=' + params.returnDate);
    if (params.adults) queryParams.push('adults=' + params.adults);
    if (params.children) queryParams.push('children=' + params.children);
    if (params.infants) queryParams.push('infants=' + params.infants);
    if (params.cabin) queryParams.push('cabin=' + params.cabin);
    if (params.tripType) queryParams.push('type=' + (params.tripType === 'round-trip' ? 'twoWay' : 'oneWay'));

    return '#/flight?' + queryParams.join('&');
  }

  /**
   * Wait for CityNet Vue app to be ready
   */
  function waitForCitynetApp(callback, timeout) {
    timeout = timeout || 10000; // 10 seconds
    let attempts = 0;
    const maxAttempts = timeout / 100;

    const checkInterval = setInterval(function() {
      attempts++;

      // Check if Vue app is mounted
      const appElement = document.getElementById('app');

      if (appElement && appElement.__vue__) {
        clearInterval(checkInterval);
        console.log('[CityNet Bridge] Vue app detected');
        callback(appElement.__vue__);
      } else if (attempts >= maxAttempts) {
        clearInterval(checkInterval);
        console.warn('[CityNet Bridge] Timeout waiting for Vue app');
        callback(null);
      }
    }, 100);
  }

  /**
   * Inject search parameters and trigger CityNet search
   */
  function injectSearchData(vueInstance) {
    try {
      // Get stored search data from custom widget
      const payloadStr = sessionStorage.getItem('flightSearchPayload');
      const paramsStr = sessionStorage.getItem('flightSearchParams');
      const autoSearch = sessionStorage.getItem('autoSearch');

      if (!payloadStr || autoSearch !== 'true') {
        console.log('[CityNet Bridge] No search data found or auto-search disabled');
        return;
      }

      const payload = JSON.parse(payloadStr);
      const params = paramsStr ? JSON.parse(paramsStr) : null;

      console.log('[CityNet Bridge] Payload to inject:', payload);
      console.log('[CityNet Bridge] Params:', params);

      // Convert and store in CityNet format
      const citynetPayload = convertToCitynetFormat(payload);
      storeCitynetSearchData(citynetPayload, params);

      if (!vueInstance) {
        console.warn('[CityNet Bridge] Vue instance not available, using fallback methods');
        // Set URL hash and hope CityNet reads it
        if (params) {
          const hash = buildVueRouterHash(params);
          console.log('[CityNet Bridge] Setting URL hash:', hash);
          window.location.hash = hash;
        }
        sessionStorage.setItem('autoSearch', 'false');
        return;
      }

      console.log('[CityNet Bridge] Vue instance available, attempting direct injection');

      // Strategy 1: Try Vuex store mutations (most common in CityNet apps)
      if (vueInstance.$store && typeof vueInstance.$store.commit === 'function') {
        console.log('[CityNet Bridge] Attempting Vuex mutations...');

        // List of possible mutation names CityNet might use
        const mutationAttempts = [
          'setFlightSearchData',
          'setSearchParams',
          'flight/setSearchData',
          'flight/setParams',
          'flightStore/setSearchData',
          'search/setFlightData'
        ];

        mutationAttempts.forEach(function(mutation) {
          try {
            vueInstance.$store.commit(mutation, citynetPayload);
            console.log('[CityNet Bridge] ✓ Mutation succeeded: ' + mutation);
          } catch (e) {
            // Silent fail - this is expected for non-existent mutations
          }
        });
      }

      // Strategy 2: Try Vuex store actions (might trigger API call)
      if (vueInstance.$store && typeof vueInstance.$store.dispatch === 'function') {
        console.log('[CityNet Bridge] Attempting Vuex actions...');

        const actionAttempts = [
          'performFlightSearch',
          'searchFlights',
          'flight/search',
          'flight/performSearch',
          'flightStore/search',
          'search/performFlight'
        ];

        actionAttempts.forEach(function(action) {
          try {
            vueInstance.$store.dispatch(action, citynetPayload);
            console.log('[CityNet Bridge] ✓ Action dispatched: ' + action);
          } catch (e) {
            // Silent fail
          }
        });
      }

      // Strategy 3: Navigate with Vue Router (force route change with query)
      if (vueInstance.$router && params) {
        console.log('[CityNet Bridge] Attempting Vue Router navigation...');

        try {
          vueInstance.$router.push({
            name: 'flight', // Common route name
            query: {
              from: params.origin,
              to: params.destination,
              departDate: params.departureDate,
              returnDate: params.returnDate || '',
              adults: params.adults,
              children: params.children,
              infants: params.infants,
              cabin: params.cabin,
              type: params.tripType === 'round-trip' ? 'twoWay' : 'oneWay'
            }
          });
          console.log('[CityNet Bridge] ✓ Router navigation attempted');
        } catch (e) {
          // Try alternative route patterns
          try {
            vueInstance.$router.push('/flight?' + Object.keys(params).map(function(k) {
              return k + '=' + encodeURIComponent(params[k]);
            }).join('&'));
          } catch (e2) {
            console.log('[CityNet Bridge] Router navigation failed');
          }
        }
      }

      // Strategy 4: Global event bus (Vue 2 pattern)
      if (vueInstance.$root && typeof vueInstance.$root.$emit === 'function') {
        console.log('[CityNet Bridge] Emitting global events...');

        vueInstance.$root.$emit('flight:search', citynetPayload);
        vueInstance.$root.$emit('performFlightSearch', citynetPayload);
        vueInstance.$root.$emit('search:flight', citynetPayload);
        console.log('[CityNet Bridge] ✓ Global events emitted');
      }

      // Strategy 5: Try calling a method directly on the component
      if (vueInstance.performSearch && typeof vueInstance.performSearch === 'function') {
        try {
          vueInstance.performSearch(citynetPayload);
          console.log('[CityNet Bridge] ✓ Direct component method called');
        } catch (e) {}
      }

      // Strategy 6: Set window global that CityNet might check
      window.citynetFlightSearch = citynetPayload;
      window.citynetSearchTrigger = Date.now();
      console.log('[CityNet Bridge] ✓ Global window variables set');

      // Strategy 7: Dispatch DOM event
      const domEvent = new CustomEvent('citynet:flight-search', {
        detail: { payload: citynetPayload, params: params },
        bubbles: true
      });
      document.dispatchEvent(domEvent);
      window.dispatchEvent(domEvent);
      console.log('[CityNet Bridge] ✓ DOM events dispatched');

      // Clean up auto-search flag
      sessionStorage.setItem('autoSearch', 'false');

      console.log('[CityNet Bridge] ===== INJECTION COMPLETE =====');
      console.log('[CityNet Bridge] If results don\'t appear, inspect Vue app with:');
      console.log('[CityNet Bridge]   console.log(document.getElementById("app").__vue__.$store)');

    } catch (error) {
      console.error('[CityNet Bridge] Error during injection:', error);
    }
  }

  /**
   * Diagnostic: Inspect CityNet Vue app structure
   */
  function inspectCitynetApp() {
    console.log('[CityNet Bridge] ===== DIAGNOSTIC MODE =====');

    const app = document.getElementById('app');
    if (!app || !app.__vue__) {
      console.warn('[CityNet Bridge] Vue app not found!');
      return;
    }

    const vue = app.__vue__;

    console.log('[CityNet Bridge] Vue instance:', vue);

    if (vue.$store) {
      console.log('[CityNet Bridge] Vuex Store State:', vue.$store.state);
      console.log('[CityNet Bridge] Available Mutations:', Object.keys(vue.$store._mutations));
      console.log('[CityNet Bridge] Available Actions:', Object.keys(vue.$store._actions));
    }

    if (vue.$router) {
      console.log('[CityNet Bridge] Current Route:', vue.$router.currentRoute);
      console.log('[CityNet Bridge] Available Routes:', vue.$router.options.routes);
    }

    console.log('[CityNet Bridge] Component Methods:', Object.keys(vue).filter(k => typeof vue[k] === 'function'));
    console.log('[CityNet Bridge] ===== END DIAGNOSTIC =====');
  }

  /**
   * Initialize bridge
   */
  function init() {
    // Check if we're on the flight page
    const isFlightPage = window.location.pathname.includes('/flight');

    if (!isFlightPage) {
      console.log('[CityNet Bridge] Not on flight page, skipping');
      return;
    }

    console.log('[CityNet Bridge] ===== BRIDGE ACTIVE =====');
    console.log('[CityNet Bridge] On flight page, preparing to inject search data');

    // Check if we have search data
    const hasSearchData = sessionStorage.getItem('flightSearchPayload') &&
                          sessionStorage.getItem('autoSearch') === 'true';

    if (!hasSearchData) {
      console.log('[CityNet Bridge] No pending search data found');
      console.log('[CityNet Bridge] User likely navigated directly to /flight/');
      return;
    }

    console.log('[CityNet Bridge] Search data found! Initiating injection sequence...');

    // Wait for Vue app to load, then inject
    waitForCitynetApp(function(vueInstance) {
      // Small delay to ensure Vue app is fully initialized
      setTimeout(function() {
        injectSearchData(vueInstance);

        // Run diagnostic if in debug mode
        if (window.location.search.includes('debug=bridge')) {
          setTimeout(inspectCitynetApp, 1000);
        }
      }, 500);
    }, 15000); // 15 second timeout
  }

  // Run on DOM ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

  // Expose API for manual control and debugging
  window.AlibeyqCitynetBridge = {
    /**
     * Manually trigger injection
     */
    inject: function() {
      console.log('[CityNet Bridge] Manual injection triggered');
      waitForCitynetApp(injectSearchData);
    },

    /**
     * Get stored search data
     */
    getSearchData: function() {
      const payloadStr = sessionStorage.getItem('flightSearchPayload');
      const paramsStr = sessionStorage.getItem('flightSearchParams');
      return {
        payload: payloadStr ? JSON.parse(payloadStr) : null,
        params: paramsStr ? JSON.parse(paramsStr) : null
      };
    },

    /**
     * Inspect CityNet Vue app
     */
    inspect: function() {
      inspectCitynetApp();
    },

    /**
     * Clear search data
     */
    clear: function() {
      sessionStorage.removeItem('flightSearchPayload');
      sessionStorage.removeItem('flightSearchParams');
      sessionStorage.removeItem('autoSearch');
      console.log('[CityNet Bridge] Search data cleared');
    },

    /**
     * Get help
     */
    help: function() {
      console.log(`
[CityNet Bridge] Available Commands:
  AlibeyqCitynetBridge.inject()       - Manually trigger search injection
  AlibeyqCitynetBridge.getSearchData() - View stored search data
  AlibeyqCitynetBridge.inspect()      - Inspect Vue app structure
  AlibeyqCitynetBridge.clear()        - Clear stored search data
  AlibeyqCitynetBridge.help()         - Show this help

Debugging:
  1. Search from homepage
  2. Check console for "[CityNet Bridge]" messages
  3. Run: AlibeyqCitynetBridge.inspect()
  4. Look for which strategy succeeded (✓ marks)
  5. Share console output if issues persist
      `);
    }
  };

  // Auto-show help in console
  console.log('[CityNet Bridge] Type AlibeyqCitynetBridge.help() for debugging commands');

})();
