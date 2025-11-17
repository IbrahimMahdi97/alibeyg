# Bridge v2 Testing Guide

## What Changed in v0.5.4 (CRITICAL FIX)

**FIXED:** CityNet now properly displays search results! The bridge now sets the critical Vuex state properties that CityNet requires:
- `searchedFlightFromHome` - Flag that tells CityNet the search came from homepage
- `SearchInfo` - Search parameters that CityNet uses to display results

## What Changed in v0.5.3

The bridge script has been **completely rewritten** to aggressively inject search data into CityNet's Vue.js app using **7 different strategies simultaneously**.

### Key Improvements

1. **Multiple Injection Strategies** - Tries all possible methods CityNet might use:
   - Vuex Store Mutations (6 different names)
   - Vuex Store Actions (6 different names)
   - Vue Router navigation
   - Global event bus
   - Direct component methods
   - Window globals
   - DOM events

2. **Enhanced Data Storage** - Stores search data in multiple locations:
   - sessionStorage (custom widget format)
   - localStorage (CityNet format)
   - Window globals
   - URL hash

3. **Diagnostic Tools** - Built-in debugging commands:
   ```javascript
   AlibeyqCitynetBridge.help()      // Show all commands
   AlibeyqCitynetBridge.inspect()   // Inspect CityNet Vue app
   AlibeyqCitynetBridge.getSearchData() // View stored data
   AlibeyqCitynetBridge.inject()    // Manually trigger injection
   ```

4. **Better Logging** - Clear console messages showing:
   - Which strategies succeeded (✓ marks)
   - What data was injected
   - When CityNet receives the data

---

## How to Test

### Step 1: Clear Cache

1. **Clear browser cache** (Ctrl+Shift+Delete)
2. **Clear sessionStorage**:
   ```javascript
   sessionStorage.clear();
   ```

### Step 2: Search from Homepage

1. Go to homepage: `https://alibeyg.com.iq/`
2. Fill in flight search:
   - **From:** NJF (Najaf)
   - **To:** DXB (Dubai)
   - **Depart:** Tomorrow's date
   - **Passengers:** 2 Adults
3. Click **Search Flights**

### Step 3: Monitor Console

Press **F12** → **Console** tab

You should see:
```
[CityNet Bridge] v2 Initializing...
[CityNet Bridge] ===== BRIDGE ACTIVE =====
[CityNet Bridge] Search data found! Initiating injection sequence...
[CityNet Bridge] Vue app detected
[CityNet Bridge] Payload to inject: {...}
[CityNet Bridge] Attempting Vuex mutations...
[CityNet Bridge] ✓ Mutation succeeded: setFlightSearchData
[CityNet Bridge] Attempting Vuex actions...
[CityNet Bridge] ✓ Action dispatched: searchFlights
[CityNet Bridge] ✓ Router navigation attempted
[CityNet Bridge] ✓ Global events emitted
[CityNet Bridge] ===== INJECTION COMPLETE =====
```

### Step 4: Check for Results

- Wait 2-5 seconds
- CityNet should display flight results
- If not, continue to diagnostic steps

---

## Diagnostic Steps

### 1. Inspect Vue App Structure

In browser console, run:
```javascript
AlibeyqCitynetBridge.inspect();
```

This will show:
- Vue instance details
- Available Vuex mutations
- Available Vuex actions
- Vue Router routes
- Component methods

**Look for** which mutation/action names CityNet actually uses.

### 2. Check Stored Data

```javascript
// View what was stored
AlibeyqCitynetBridge.getSearchData();

// Check all storage locations
console.log('sessionStorage:', sessionStorage.getItem('flightSearchPayload'));
console.log('localStorage:', localStorage.getItem('cn_flight_search'));
console.log('window global:', window.citynetFlightSearch);
```

### 3. Manual Injection

If results don't appear automatically:
```javascript
// Re-trigger the injection
AlibeyqCitynetBridge.inject();

// Wait a few seconds and check again
```

### 4. Check Network Tab

Press **F12** → **Network** tab

- Filter by **XHR** or **Fetch**
- Search from homepage
- Look for flight search API calls
- **Question:** Is CityNet making its own API call?

---

## Expected Behaviors

### ✅ SUCCESS - CityNet Shows Results

If you see flight results in CityNet's UI:
- The bridge worked!
- One or more strategies succeeded
- Check console for ✓ marks to see which one

### ⚠️ PARTIAL - API Call but No Display

If Network tab shows API call but no results display:
- CityNet is receiving the data
- But not updating the UI
- Run `AlibeyqCitynetBridge.inspect()` to see Vue state
- Share console output

### ❌ FAILURE - No API Call

If Network tab shows NO flight search API:
- CityNet isn't receiving the data
- Or CityNet uses a different method
- Run diagnostic and share output

---

## Sharing Debug Info

If it still doesn't work, run these commands and share the output:

```javascript
// 1. Get Vue app structure
AlibeyqCitynetBridge.inspect();

// 2. Get stored data
console.log('Search Data:', AlibeyqCitynetBridge.getSearchData());

// 3. Check Vue store state
const app = document.getElementById('app').__vue__;
console.log('Store State:', app.$store.state);
console.log('Current Route:', app.$router.currentRoute);

// 4. List all mutations and actions
console.log('Mutations:', Object.keys(app.$store._mutations));
console.log('Actions:', Object.keys(app.$store._actions));
```

Copy ALL console output and share it.

---

## Troubleshooting

### Issue: "Vue app not found"

**Cause:** CityNet Vue app hasn't loaded yet

**Fix:** Wait a few seconds and run:
```javascript
AlibeyqCitynetBridge.inject();
```

### Issue: Many strategies fail silently

**This is normal!** The bridge tries 7 strategies.
**Only 1-2 need to succeed.**
Look for messages with ✓ marks.

### Issue: Injection complete but no results

**Cause:** CityNet might need a specific mutation/action name

**Fix:** Run `AlibeyqCitynetBridge.inspect()` and share the mutation names.
We can add the correct name to the bridge script.

---

## Debug Mode

Add `?debug=bridge` to the URL to enable extra diagnostics:
```
https://alibeyg.com.iq/flight/?debug=bridge
```

This will automatically run the inspection after injection.

---

## Version Info

- **Bridge Version:** 0.5.4
- **Plugin Version:** 0.5.4
- **Last Updated:** 2025-11-17
- **Critical Fix:** Sets searchedFlightFromHome and SearchInfo in Vuex store

---

## Quick Commands Reference

```javascript
AlibeyqCitynetBridge.help()         // Show help
AlibeyqCitynetBridge.inspect()      // Inspect Vue app
AlibeyqCitynetBridge.getSearchData() // Get stored data
AlibeyqCitynetBridge.inject()       // Manual injection
AlibeyqCitynetBridge.clear()        // Clear stored data
```

---

**Next:** Test and share console output! 🚀
