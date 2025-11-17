# Search Functionality Fix - Implementation Guide

## ✅ Changes Made

### 1. Homepage Template Updated
**File**: `/wp-content/themes/citynet/homepage.php`

**Changed from:**
```php
<?= do_shortcode('[citynet]') ?>
```

**Changed to:**
```php
<?= do_shortcode('[alibeyg_travel_widget flight_url="/flight/" hotel_url="/hotel/" visa_url="/visa/"]') ?>
```

This replaces the CityNet Vue.js widget with your custom Alibeyg travel widget on the homepage.

---

## 🔧 Manual Steps Required

### Step 1: Update the Flight Results Page

The `/flight/` page is stored in the WordPress database and needs to be updated manually.

**Instructions:**

1. **Log in to WordPress Admin**
   - Go to: `https://alibeyg.com.iq/wp-admin/`

2. **Navigate to Pages**
   - Click **Pages → All Pages** in the left sidebar

3. **Find the Flight Page**
   - Look for the page titled **"flight"**
   - URL should be `/flight/`
   - Click **Edit**

4. **Replace the Shortcode**
   - You'll see the content: `[citynet]`
   - **Delete** `[citynet]`
   - **Add** this instead:
     ```
     [alibeyg_flight_results]
     ```

5. **Update the Page**
   - Click the blue **Update** button
   - Done!

---

## 🧪 Testing the Search Flow

After making the changes above, test the complete flow:

### Test 1: Basic Flight Search

1. Go to your homepage: `https://alibeyg.com.iq/`
2. You should see the custom Alibeyg travel widget (may look different from CityNet)
3. Fill in flight search:
   - **From**: NJF (Najaf)
   - **To**: THR (Tehran)
   - **Depart Date**: Select any future date
   - **Passengers**: 2 Adults
4. Click **Search Flights**
5. You should be redirected to `/flight/`
6. You should see:
   - ✅ Search parameters displayed at top
   - ✅ "Searching for flights..." loading message
   - ✅ Flight results after a few seconds

### Test 2: Browser Console Check

1. Press **F12** to open Developer Tools
2. Go to **Console** tab
3. Look for these messages:
   ```
   [Alibeyg Flight Results] Initializing...
   [Alibeyg Flight Results] Auto-search enabled, loading results...
   [Alibeyg Flight Results] Search payload: {...}
   [Alibeyg Flight Results] Calling API: /wp-json/alibeyg/v1/flight-search
   [Alibeyg Flight Results] API Response status: 200
   ```

4. If you see errors, copy them and share for debugging

### Test 3: Direct Page Access

1. Navigate directly to `/flight/` without searching
2. You should see a message like "No search parameters found"
3. This is expected behavior

---

## 🎨 Expected Visual Changes

### Homepage
- The widget may look slightly different
- It's the Alibeyg-branded widget instead of CityNet
- Functionality remains the same
- Autocomplete should work for airports/cities

### Flight Results Page
- Will show search parameters at the top
- Loading spinner while fetching results
- Results displayed in a simple list format
- Can be customized further (see Customization section below)

---

## 🐛 Troubleshooting

### Issue: Homepage shows nothing / broken layout

**Cause**: The `alibeyg-citynet-bridge` plugin might not be activated

**Fix**:
1. Go to **Plugins → Installed Plugins**
2. Find **"Alibeyg Citynet Bridge"**
3. Click **Activate**
4. Refresh homepage

### Issue: Flight results page shows "No search parameters found"

**Cause**: You navigated directly to `/flight/` without searching

**Fix**: This is normal. Search from the homepage first.

### Issue: Search redirects but shows nothing

**Cause**: The shortcode wasn't updated on the flight page

**Fix**: Double-check Step 1 above - make sure `/flight/` page has `[alibeyg_flight_results]`

### Issue: "API Error" or "Search failed"

**Cause**: API configuration might be missing

**Fix**: Check `/wp-config.php` has these defined:
```php
define('CN_API_BASE', 'https://171.22.24.69/api/v1.0/');
define('CN_ORG_ID', 12345); // Your actual org ID
define('CN_API_KEY', 'your-api-key-here'); // Your actual API key
```

---

## 🎨 Customization Options

### Change Widget Colors

Edit the shortcode on homepage template to customize colors:

```php
<?= do_shortcode('[alibeyg_travel_widget
    flight_url="/flight/"
    hotel_url="/hotel/"
    visa_url="/visa/"
    primary="#B8011F"
    primary_hover="#9a0119"
]') ?>
```

### Customize Results Display

See `/wp-content/plugins/alibeyg-citynet-bridge/FLIGHT-RESULTS-SETUP.md` for:
- Custom HTML templates
- JavaScript event handlers
- CSS styling options

---

## 📋 Rollback Instructions

If you need to revert to the old system:

### 1. Restore Homepage

Edit `/wp-content/themes/citynet/homepage.php` and change back to:
```php
<?= do_shortcode('[citynet]') ?>
```

### 2. Restore Flight Page

1. Edit `/flight/` page in WordPress admin
2. Change shortcode back to: `[citynet]`
3. Update

---

## 📞 Support

If you encounter issues:

1. **Check browser console** for JavaScript errors (F12 → Console tab)
2. **Check WordPress error logs** at `/wp-content/debug.log`
3. **Verify plugin version** is 0.5.1 or higher
4. **Test API directly** using curl or Postman

---

## ✅ Completion Checklist

- [ ] Homepage template updated (already done via code)
- [ ] Logged into WordPress admin
- [ ] Flight page shortcode changed to `[alibeyg_flight_results]`
- [ ] Homepage tested - widget displays
- [ ] Search tested - redirects to /flight/
- [ ] Results page tested - shows search parameters
- [ ] Results page tested - displays flight results
- [ ] Browser console checked - no errors

---

**Last Updated**: 2025-11-17
**Plugin Version**: alibeyg-citynet-bridge v0.5.1
