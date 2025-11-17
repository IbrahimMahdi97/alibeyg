/**
 * CityNet Bridge Script
 *
 * This script acts as a bridge between the custom Alibeyg search widget
 * and the CityNet Vue.js application.
 *
 * Flow:
 * 1. Custom widget stores search data in sessionStorage
 * 2. This script reads that data when /flight/ page loads
 * 3. Passes data to CityNet Vue app for display
 *
 * @package Alibeyg_Citynet_Bridge
 * @since 0.5.2
 */

(function() {
  'use strict';

  console.log('[CityNet Bridge] Initializing...');

  /**
   * Wait for CityNet Vue app to be ready
   */
  function waitForCitynetApp(callback) {
    let attempts = 0;
    const maxAttempts = 50; // 5 seconds max

    const checkInterval = setInterval(function() {
      attempts++;

      // Check if Vue app is mounted (look for the #app element with Vue instance)
      const appElement = document.getElementById('app');

      if (appElement && appElement.__vue__) {
        clearInterval(checkInterval);
        console.log('[CityNet Bridge] Vue app detected, ready to inject data');
        callback(appElement.__vue__);
      } else if (attempts >= maxAttempts) {
        clearInterval(checkInterval);
        console.warn('[CityNet Bridge] Timeout waiting for Vue app');
      }
    }, 100);
  }

  /**
   * Inject search parameters into CityNet Vue app
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

      console.log('[CityNet Bridge] Search data found:', {payload, params});

      // Try to access Vuex store
      if (vueInstance.$store) {
        console.log('[CityNet Bridge] Vuex store detected');

        // Option 1: Try to set search parameters in Vuex store
        // The exact mutation name depends on CityNet's implementation
        // Common patterns:
        if (typeof vueInstance.$store.commit === 'function') {
          try {
            // Try common mutation names
            vueInstance.$store.commit('setFlightSearchParams', payload);
          } catch (e) {
            console.log('[CityNet Bridge] Mutation setFlightSearchParams not found');
          }

          try {
            vueInstance.$store.commit('flight/setSearchParams', payload);
          } catch (e) {
            console.log('[CityNet Bridge] Mutation flight/setSearchParams not found');
          }
        }

        // Option 2: Try to dispatch an action
        if (typeof vueInstance.$store.dispatch === 'function') {
          try {
            vueInstance.$store.dispatch('searchFlights', payload);
          } catch (e) {
            console.log('[CityNet Bridge] Action searchFlights not found');
          }

          try {
            vueInstance.$store.dispatch('flight/search', payload);
          } catch (e) {
            console.log('[CityNet Bridge] Action flight/search not found');
          }
        }
      }

      // Option 3: Use Vue Router to pass data
      if (vueInstance.$router) {
        console.log('[CityNet Bridge] Vue Router detected');

        try {
          // Navigate with query parameters
          vueInstance.$router.push({
            path: '/flight',
            query: {
              from: params?.from || '',
              to: params?.to || '',
              departDate: params?.departDate || '',
              returnDate: params?.returnDate || '',
              adults: params?.adults || 1,
              children: params?.children || 0,
              infants: params?.infants || 0,
              class: params?.class || 'economy',
              tripType: params?.tripType || 'roundtrip'
            }
          });
          console.log('[CityNet Bridge] Navigated with query params');
        } catch (e) {
          console.error('[CityNet Bridge] Router navigation failed:', e);
        }
      }

      // Option 4: Try global event bus
      if (vueInstance.$root && typeof vueInstance.$root.$emit === 'function') {
        console.log('[CityNet Bridge] Emitting search event on global bus');
        vueInstance.$root.$emit('performFlightSearch', payload);
        vueInstance.$root.$emit('flight:search', payload);
      }

      // Option 5: Direct localStorage approach (CityNet might read from here)
      try {
        localStorage.setItem('citynet_flight_search', JSON.stringify(payload));
        localStorage.setItem('citynet_search_trigger', Date.now().toString());
        console.log('[CityNet Bridge] Stored search data in localStorage');
      } catch (e) {
        console.error('[CityNet Bridge] localStorage write failed:', e);
      }

      // Option 6: Trigger a custom event that CityNet might listen to
      const searchEvent = new CustomEvent('citynet:flight-search', {
        detail: {
          payload: payload,
          params: params
        }
      });
      window.dispatchEvent(searchEvent);
      console.log('[CityNet Bridge] Dispatched citynet:flight-search event');

      // Clean up auto-search flag (so it doesn't trigger again)
      sessionStorage.setItem('autoSearch', 'false');

      console.log('[CityNet Bridge] Search data injection complete');

    } catch (error) {
      console.error('[CityNet Bridge] Error injecting search data:', error);
    }
  }

  /**
   * Alternative: Direct URL parameter injection
   *
   * If Vue app reads from URL hash, we can manipulate it
   */
  function tryURLHashInjection() {
    try {
      const payloadStr = sessionStorage.getItem('flightSearchPayload');
      const paramsStr = sessionStorage.getItem('flightSearchParams');
      const autoSearch = sessionStorage.getItem('autoSearch');

      if (!payloadStr || autoSearch !== 'true') {
        return;
      }

      const params = paramsStr ? JSON.parse(paramsStr) : null;

      if (params) {
        // Build URL hash for Vue Router
        const hashPath = `#/flight?from=${params.from || ''}&to=${params.to || ''}&departDate=${params.departDate || ''}&returnDate=${params.returnDate || ''}&adults=${params.adults || 1}&children=${params.children || 0}&infants=${params.infants || 0}&class=${params.class || 'economy'}`;

        console.log('[CityNet Bridge] Setting URL hash:', hashPath);
        window.location.hash = hashPath;

        // Clean up
        sessionStorage.setItem('autoSearch', 'false');
      }
    } catch (error) {
      console.error('[CityNet Bridge] URL hash injection failed:', error);
    }
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

    console.log('[CityNet Bridge] On flight page, checking for search data...');

    // Try URL hash injection first (works immediately)
    tryURLHashInjection();

    // Then wait for Vue app and inject via Vue instance
    waitForCitynetApp(injectSearchData);

    // Also emit a global event that can be caught by any listener
    setTimeout(function() {
      const payloadStr = sessionStorage.getItem('flightSearchPayload');
      if (payloadStr) {
        try {
          const payload = JSON.parse(payloadStr);
          window.alibeyg_flight_search_data = payload;
          console.log('[CityNet Bridge] Global search data available at window.alibeyg_flight_search_data');
        } catch (e) {
          console.error('[CityNet Bridge] Failed to set global search data');
        }
      }
    }, 100);
  }

  // Run on DOM ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

  // Expose API for manual triggering
  window.AlibeyqCitynetBridge = {
    inject: function() {
      console.log('[CityNet Bridge] Manual injection triggered');
      waitForCitynetApp(injectSearchData);
    },
    getSearchData: function() {
      const payloadStr = sessionStorage.getItem('flightSearchPayload');
      const paramsStr = sessionStorage.getItem('flightSearchParams');
      return {
        payload: payloadStr ? JSON.parse(payloadStr) : null,
        params: paramsStr ? JSON.parse(paramsStr) : null
      };
    }
  };

})();
