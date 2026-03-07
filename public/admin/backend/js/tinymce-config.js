/**
 * Centralized TinyMCE Configuration
 * This file contains all TinyMCE initialization settings
 * API Key: uuplv3gdf7kqs57rfobqxdrreyfr5dxkotezevdekz1wscug
 */

// TinyMCE CDN URL with API Key
const TINYMCE_CDN_URL = 'https://cdn.tiny.cloud/1/uuplv3gdf7kqs57rfobqxdrreyfr5dxkotezevdekz1wscug/tinymce/6/tinymce.min.js';

// Base TinyMCE Configuration
const TINYMCE_BASE_CONFIG = {
    height: 600,
    menubar: true,
    plugins: [
        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
        'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
        'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
    ],
    toolbar: 'undo redo | blocks | ' +
        'bold italic forecolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | table | link image | code | help',
    content_style: 'body { font-family: Arial, sans-serif; font-size: 14px; }',
    paste_as_text: false,
    paste_merge_formats: true,
    paste_remove_styles_if_webkit: false,
    paste_strip_class_attributes: "none",
    table_default_attributes: {
        border: '1'
    },
    table_default_styles: {
        'border-collapse': 'collapse',
        'width': '100%',
        'border': '1px solid #ddd'
    },
    table_class_list: [
        {title: 'None', value: ''},
        {title: 'Table', value: 'table table-bordered'}
    ]
};

// Standard Editor Configuration (for most forms)
const TINYMCE_STANDARD_CONFIG = {
    ...TINYMCE_BASE_CONFIG,
    height: 600
};

// Compact Editor Configuration (for smaller fields like sub_title)
const TINYMCE_COMPACT_CONFIG = {
    ...TINYMCE_BASE_CONFIG,
    height: 200,
    menubar: true,
    toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | bullist numlist | link | code',
    plugins: ['lists', 'link', 'code', 'autolink']
};

// Minimal Editor Configuration (for simple text fields)
const TINYMCE_MINIMAL_CONFIG = {
    ...TINYMCE_BASE_CONFIG,
    height: 150,
    menubar: false,
    plugins: ['lists', 'link', 'code'],
    toolbar: 'bold italic | bullist numlist | link | code'
};

/**
 * Initialize TinyMCE editor
 * @param {string} selector - CSS selector for the editor (e.g., '#summernote', '#description')
 * @param {object} customConfig - Custom configuration to merge with base config
 * @param {function} setupCallback - Optional callback function for setup
 */
function initTinyMCE(selector, customConfig = {}, setupCallback = null) {
    // Wait for TinyMCE to be fully loaded
    if (typeof tinymce === 'undefined') {
        console.warn('TinyMCE not loaded yet, retrying in 100ms...');
        setTimeout(function() {
            initTinyMCE(selector, customConfig, setupCallback);
        }, 100);
        return;
    }
    
    // Check if editor already exists
    const editorId = selector.replace('#', '');
    if (tinymce.get(editorId)) {
        console.log('Editor ' + selector + ' already initialized, skipping...');
        return;
    }
    
    // Create config - if customConfig has its own base config (like COMPACT_CONFIG), use it directly
    // Otherwise merge customConfig on top of STANDARD_CONFIG
    let config;
    if (customConfig && customConfig.height && customConfig.menubar !== undefined) {
        // This looks like a predefined config (COMPACT_CONFIG or MINIMAL_CONFIG)
        // Use it as the base and just add the selector
        config = JSON.parse(JSON.stringify(customConfig));
        config.selector = selector;
    } else {
        // This is a custom config object, merge it on top of STANDARD_CONFIG
        const baseConfig = JSON.parse(JSON.stringify(TINYMCE_STANDARD_CONFIG));
        config = {
            ...baseConfig,
            selector: selector,
            ...customConfig
        };
    }
    
    // Ensure selector is set correctly
    config.selector = selector;
    
    // Ensure menubar is explicitly set if it was in the customConfig
    if (customConfig && customConfig.menubar !== undefined) {
        config.menubar = customConfig.menubar;
    }
    
    if (setupCallback) {
        config.setup = setupCallback;
    }
    
    try {
        tinymce.init(config);
        console.log('TinyMCE initialized for: ' + selector + ', menubar: ' + config.menubar);
    } catch (error) {
        console.error('Error initializing TinyMCE for ' + selector + ':', error);
    }
}

/**
 * Load TinyMCE script dynamically
 * @param {function} callback - Callback function to execute after TinyMCE loads
 */
function loadTinyMCEScript(callback) {
    if (typeof tinymce !== 'undefined') {
        if (callback) callback();
        return;
    }
    
    const script = document.createElement('script');
    script.src = TINYMCE_CDN_URL;
    script.referrerPolicy = 'origin';
    script.onload = function() {
        if (callback) callback();
    };
    script.onerror = function() {
        console.error('Failed to load TinyMCE script');
    };
    document.head.appendChild(script);
}

/**
 * Get content from TinyMCE editor
 * @param {string} selector - CSS selector for the editor (with or without #)
 * @returns {string} Editor content
 */
function getTinyMCEContent(selector) {
    if (typeof tinymce !== 'undefined') {
        const editorId = selector.replace('#', '');
        const editor = tinymce.get(editorId);
        if (editor) {
            return editor.getContent();
        }
    }
    // Fallback to textarea value
    const $element = $(selector);
    if ($element.length) {
        return $element.val() || '';
    }
    return '';
}

/**
 * Set content in TinyMCE editor
 * @param {string} selector - CSS selector for the editor (with or without #)
 * @param {string} content - Content to set
 */
function setTinyMCEContent(selector, content) {
    if (typeof tinymce !== 'undefined') {
        const editorId = selector.replace('#', '');
        const editor = tinymce.get(editorId);
        if (editor) {
            editor.setContent(content || '');
            return;
        }
    }
    // Fallback to textarea value
    const $element = $(selector);
    if ($element.length) {
        $element.val(content || '');
    }
}
