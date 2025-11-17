# CityNet Bridge Integration Guide

## ✅ What Has Been Done

Your website now uses a **hybrid approach** that bridges your custom search widget with the CityNet Vue.js application:

### Architecture

```
┌─────────────────────────────────────────────────────────────────┐
│ Homepage (homepage.php)                                         │
│ ┌─────────────────────────────────────────────────────────────┐ │
│ │ [alibeyg_travel_widget]                                     │ │
│ │ - User fills search form                                    │ │
│ │ - Stores data in sessionStorage                             │ │
│ │ - Redirects to /flight/                                     │ │
│ └─────────────────────────────────────────────────────────────┘ │
└─────────────────────────────────────────────────────────────────┘
                            ↓
┌─────────────────────────────────────────────────────────────────┐
│ Flight Page (/flight/)                                          │
│ ┌───────────────────┐  ┌────────────────────────────────────┐  │
│ │ [citynet]         │  │ citynet-bridge.js                  │  │
│ │ Vue.js SPA        │←─│ - Reads sessionStorage             │  │
│ │ (Results display) │  │ - Injects data into Vue app        │  │
│ │                   │  │ - Triggers search                  │  │
│ └───────────────────┘  └────────────────────────────────────┘  │
└─────────────────────────────────────────────────────────────────┘
```

### Changes Made

#### 1. Homepage Template (`wp-content/themes/citynet/homepage.php`)
- **Changed from:** `[citynet]` shortcode
- **Changed to:** `[alibeyg_travel_widget]` shortcode
- **Benefit:** You control the search form UI and can customize it

#### 2. New Bridge Script (`citynet-bridge.js`)
- **Location:** `wp-content/plugins/alibeyg-citynet-bridge/assets/js/citynet-bridge.js`
- **Purpose:** Connects your custom widget to CityNet's Vue.js app
- **Auto-loads:** Automatically on `/flight/` page
- **How it works:**
  1. Reads search data from `sessionStorage`
  2. Waits for CityNet Vue app to load
  3. Injects search parameters into Vue app using multiple strategies
  4. Triggers the search

#### 3. Plugin Updates (`class-plugin.php`)
- Added `enqueue_citynet_bridge()` method
- Automatically loads bridge script on flight page
- Version bumped to 0.5.2

---

## 🎯 How It Works

### Search Flow

1. **User visits homepage**
   - Sees custom Alibeyg search widget
   - Fills in flight search form

2. **User clicks "Search"**
   - JavaScript stores search data:
     ```javascript
     sessionStorage.setItem('flightSearchPayload', JSON.stringify(apiPayload));
     sessionStorage.setItem('flightSearchParams', JSON.stringify(humanParams));
     sessionStorage.setItem('autoSearch', 'true');
     ```
   - Redirects to `/flight/`

3. **Flight page loads**
   - CityNet's `[citynet]` shortcode loads Vue.js app
   - Bridge script (`citynet-bridge.js`) loads automatically
   - Bridge waits for Vue app to be ready
   - Bridge injects search data using **multiple strategies**

4. **Search results display**
   - CityNet Vue.js app receives search parameters
   - Performs API search
   - Displays results in CityNet's UI

### Bridge Injection Strategies

The bridge script tries multiple approaches to ensure compatibility:

#### Strategy 1: Vuex Store Mutations
```javascript
vueInstance.$store.commit('setFlightSearchParams', payload);
vueInstance.$store.commit('flight/setSearchParams', payload);
```

#### Strategy 2: Vuex Store Actions
```javascript
vueInstance.$store.dispatch('searchFlights', payload);
vueInstance.$store.dispatch('flight/search', payload);
```

#### Strategy 3: Vue Router Query Parameters
```javascript
vueInstance.$router.push({
  path: '/flight',
  query: { from, to, departDate, adults, ... }
});
```

#### Strategy 4: Global Event Bus
```javascript
vueInstance.$root.$emit('performFlightSearch', payload);
```

#### Strategy 5: LocalStorage
```javascript
localStorage.setItem('citynet_flight_search', JSON.stringify(payload));
```

#### Strategy 6: Custom Events
```javascript
window.dispatchEvent(new CustomEvent('citynet:flight-search', {
  detail: { payload, params }
}));
```

#### Strategy 7: URL Hash
```javascript
window.location.hash = '#/flight?from=...&to=...';
```

---

## 🧪 Testing

### 1. Verify Homepage Widget

1. Visit homepage: `https://alibeyg.com.iq/`
2. Check that you see the **Alibeyg custom widget** (not CityNet's default)
3. Verify search form has:
   - From/To airport fields with autocomplete
   - Date pickers
   - Passenger selector
   - Class selector

### 2. Test Search Flow

1. Fill in search:
   - **From:** NJF (Najaf)
   - **To:** DXB (Dubai)
   - **Depart:** Select future date
   - **Passengers:** 2 Adults
2. Click **Search Flights**
3. You should be redirected to `/flight/`

### 3. Check Console Logs

Press **F12** → **Console** tab. You should see:

```
[Alibeyg] CityNet Bridge script loaded
[CityNet Bridge] Initializing...
[CityNet Bridge] On flight page, checking for search data...
[CityNet Bridge] Setting URL hash: #/flight?from=NJF&to=DXB&...
[CityNet Bridge] Vue app detected, ready to inject data
[CityNet Bridge] Search data found: {...}
[CityNet Bridge] Vuex store detected
[CityNet Bridge] Vue Router detected
[CityNet Bridge] Search data injection complete
```

### 4. Verify Results Display

After a few seconds, you should see:
- CityNet's flight results UI
- Search results from the API
- Booking options

---

## 🐛 Troubleshooting

### Issue: Homepage still shows CityNet widget

**Cause:** Browser cache

**Fix:**
1. Hard refresh: `Ctrl+Shift+R` (Windows) or `Cmd+Shift+R` (Mac)
2. Clear browser cache
3. Check homepage template has `[alibeyg_travel_widget]` not `[citynet]`

### Issue: Flight page shows no results

**Cause:** Bridge script not loading or CityNet not reading data

**Fix:**
1. Check browser console for errors
2. Look for `[CityNet Bridge]` log messages
3. Check if `sessionStorage` has data:
   ```javascript
   console.log(sessionStorage.getItem('flightSearchPayload'));
   ```
4. Manually trigger bridge:
   ```javascript
   window.AlibeyqCitynetBridge.inject();
   ```

### Issue: Search parameters are wrong

**Cause:** Cached data in sessionStorage

**Fix:**
1. Clear sessionStorage:
   ```javascript
   sessionStorage.clear();
   ```
2. Search again from homepage

### Issue: Bridge logs show but nothing happens

**Cause:** CityNet might use a different method to receive search data

**Solution:** We need to inspect CityNet's Vue app to find the correct method

**Debugging steps:**
1. Open browser console on `/flight/` page
2. Check Vue instance:
   ```javascript
   const app = document.getElementById('app').__vue__;
   console.log(app.$store); // Check Vuex store structure
   console.log(app.$router); // Check Vue Router
   ```
3. Look for search-related mutations/actions:
   ```javascript
   console.log(Object.keys(app.$store._mutations));
   console.log(Object.keys(app.$store._actions));
   ```

---

## 🔧 Advanced: Customizing the Bridge

If the default strategies don't work, you can customize the bridge script.

### Add a Custom Strategy

Edit `/wp-content/plugins/alibeyg-citynet-bridge/assets/js/citynet-bridge.js`:

```javascript
function injectSearchData(vueInstance) {
  // ... existing code ...

  // Add your custom strategy here
  try {
    // Example: Direct method call
    if (typeof vueInstance.performFlightSearch === 'function') {
      vueInstance.performFlightSearch(payload);
      console.log('[CityNet Bridge] Custom method called');
    }
  } catch (e) {
    console.error('[CityNet Bridge] Custom strategy failed:', e);
  }

  // ... existing code ...
}
```

### Manual Triggering

You can manually trigger the bridge from browser console:

```javascript
// Get search data
const data = window.AlibeyqCitynetBridge.getSearchData();
console.log(data);

// Re-inject
window.AlibeyqCitynetBridge.inject();
```

---

## 📋 Files Modified

1. ✅ `wp-content/themes/citynet/homepage.php`
   - Replaced `[citynet]` with `[alibeyg_travel_widget]`

2. ✅ `wp-content/plugins/alibeyg-citynet-bridge/assets/js/citynet-bridge.js`
   - **NEW FILE** - Bridge script

3. ✅ `wp-content/plugins/alibeyg-citynet-bridge/includes/class-plugin.php`
   - Added `enqueue_citynet_bridge()` method
   - Version updated to 0.5.2

4. ✅ `wp-content/plugins/alibeyg-citynet-bridge/alibeyg-citynet-bridge.php`
   - Version updated to 0.5.2
   - Description updated

---

## 🎨 No Changes Needed to Flight Page

**Important:** You do NOT need to change the `/flight/` page in WordPress admin!

- ✅ Keep `[citynet]` shortcode as is
- ✅ CityNet Vue.js app continues to work normally
- ✅ Bridge script automatically injects search data

---

## 🚀 Deployment Checklist

- [✅] Homepage template updated
- [✅] Bridge script created
- [✅] Plugin updated with auto-load functionality
- [✅] Version bumped to 0.5.2
- [⏳] Changes committed to git
- [⏳] Changes pushed to repository
- [⏳] Plugin activated on production
- [⏳] Test search flow on production
- [⏳] Monitor browser console for errors

---

## 📞 Support & Debugging

If results still don't show:

1. **Provide console output:**
   - Copy all `[CityNet Bridge]` messages
   - Copy any error messages

2. **Check Vue app structure:**
   ```javascript
   const app = document.getElementById('app').__vue__;
   console.log('Store:', app.$store);
   console.log('Router:', app.$router);
   console.log('Mutations:', Object.keys(app.$store._mutations));
   ```

3. **Check search data:**
   ```javascript
   console.log(sessionStorage.getItem('flightSearchPayload'));
   console.log(window.alibeyg_flight_search_data);
   ```

This information will help identify which strategy works with CityNet's implementation.

---

**Version:** 0.5.2
**Last Updated:** 2025-11-17
**Status:** Ready for testing
