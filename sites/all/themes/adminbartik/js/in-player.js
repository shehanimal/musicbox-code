/*!
 * MediaElement.js
 * HTML5 <video> and <audio> shim and player
 * http://mediaelementjs.com/
 *
 * Creates a JavaScript object that mimics HTML5 MediaElement API
 * for browsers that don't understand HTML5 or can't play the provided codec
 * Can play MP4 (H.264), Ogg, WebM, FLV, WMV, WMA, ACC, and MP3
 *
 * Copyright 2010-2012, John Dyer (http://j.hn)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 */
var mejs = mejs || {};
mejs.version = "2.7.0";
mejs.meIndex = 0;
mejs.plugins = {
    silverlight: [{
        version: [3, 0],
        types: ["video/mp4", "video/m4v", "video/mov", "video/wmv", "audio/wma", "audio/m4a", "audio/mp3", "audio/wav", "audio/mpeg"]
    }],
    flash: [{
        version: [9, 0, 124],
        types: ["video/mp4", "video/m4v", "video/mov", "video/flv", "video/x-flv", "audio/flv", "audio/x-flv", "audio/mp3", "audio/m4a", "audio/mpeg"]
    }],
    youtube: [{
        version: null,
        types: ["video/youtube"]
    }],
    vimeo: [{
        version: null,
        types: ["video/vimeo"]
    }]
};
mejs.Utility = {
    encodeUrl: function(a) {
        return encodeURIComponent(a)
    },
    escapeHTML: function(a) {
        return a.toString().split("&").join("&amp;").split("<").join("&lt;").split('"').join("&quot;")
    },
    absolutizeUrl: function(a) {
        var b = document.createElement("div");
        b.innerHTML = '<a href="' + this.escapeHTML(a) + '">x</a>';
        return b.firstChild.href
    },
    getScriptPath: function(a) {
        for (var b = 0, c, d = "", e = "", g, f = document.getElementsByTagName("script"), j = f.length, h = a.length; b < j; b++) {
            g = f[b].src;
            for (c = 0; c < h; c++) {
                e = a[c];
                if (g.indexOf(e) >
                    -1) {
                    d = g.substring(0, g.indexOf(e));
                    break
                }
            }
            if (d !== "") break
        }
        return d
    },
    secondsToTimeCode: function(a, b, c, d) {
        if (typeof c == "undefined") c = false;
        else if (typeof d == "undefined") d = 25;
        var e = Math.floor(a / 3600) % 24,
            g = Math.floor(a / 60) % 60,
            f = Math.floor(a % 60);
        a = Math.floor((a % 1 * d).toFixed(3));
        return (b || e > 0 ? (e < 10 ? "0" + e : e) + ":" : "") + (g < 10 ? "0" + g : g) + ":" + (f < 10 ? "0" + f : f) + (c ? ":" + (a < 10 ? "0" + a : a) : "")
    },
    timeCodeToSeconds: function(a, b, c, d) {
        if (typeof c == "undefined") c = false;
        else if (typeof d == "undefined") d = 25;
        a = a.split(":");
        b = parseInt(a[0],
            10);
        var e = parseInt(a[1], 10),
            g = parseInt(a[2], 10),
            f = 0,
            j = 0;
        if (c) f = parseInt(a[3]) / d;
        return j = b * 3600 + e * 60 + g + f
    },
    removeSwf: function(a) {
        var b = document.getElementById(a);
        if (b && b.nodeName == "OBJECT")
            if (mejs.MediaFeatures.isIE) {
                b.style.display = "none";
                (function() {
                    b.readyState == 4 ? mejs.Utility.removeObjectInIE(a) : setTimeout(arguments.callee, 10)
                })()
            } else b.parentNode.removeChild(b)
    },
    removeObjectInIE: function(a) {
        if (a = document.getElementById(a)) {
            for (var b in a)
                if (typeof a[b] == "function") a[b] = null;
            a.parentNode.removeChild(a)
        }
    }
};
mejs.PluginDetector = {
    hasPluginVersion: function(a, b) {
        var c = this.plugins[a];
        b[1] = b[1] || 0;
        b[2] = b[2] || 0;
        return c[0] > b[0] || c[0] == b[0] && c[1] > b[1] || c[0] == b[0] && c[1] == b[1] && c[2] >= b[2] ? true : false
    },
    nav: window.navigator,
    ua: window.navigator.userAgent.toLowerCase(),
    plugins: [],
    addPlugin: function(a, b, c, d, e) {
        this.plugins[a] = this.detectPlugin(b, c, d, e)
    },
    detectPlugin: function(a, b, c, d) {
        var e = [0, 0, 0],
            g;
        if (typeof this.nav.plugins != "undefined" && typeof this.nav.plugins[a] == "object") {
            if ((c = this.nav.plugins[a].description) &&
                !(typeof this.nav.mimeTypes != "undefined" && this.nav.mimeTypes[b] && !this.nav.mimeTypes[b].enabledPlugin)) {
                e = c.replace(a, "").replace(/^\s+/, "").replace(/\sr/gi, ".").split(".");
                for (a = 0; a < e.length; a++) e[a] = parseInt(e[a].match(/\d+/), 10)
            }
        } else if (typeof window.ActiveXObject != "undefined") try {
            if (g = new ActiveXObject(c)) e = d(g)
        } catch (f) {}
        return e
    }
};
mejs.PluginDetector.addPlugin("flash", "Shockwave Flash", "application/x-shockwave-flash", "ShockwaveFlash.ShockwaveFlash", function(a) {
    var b = [];
    if (a = a.GetVariable("$version")) {
        a = a.split(" ")[1].split(",");
        b = [parseInt(a[0], 10), parseInt(a[1], 10), parseInt(a[2], 10)]
    }
    return b
});
mejs.PluginDetector.addPlugin("silverlight", "Silverlight Plug-In", "application/x-silverlight-2", "AgControl.AgControl", function(a) {
    var b = [0, 0, 0, 0],
        c = function(d, e, g, f) {
            for (; d.isVersionSupported(e[0] + "." + e[1] + "." + e[2] + "." + e[3]);) e[g] += f;
            e[g] -= f
        };
    c(a, b, 0, 1);
    c(a, b, 1, 1);
    c(a, b, 2, 1E4);
    c(a, b, 2, 1E3);
    c(a, b, 2, 100);
    c(a, b, 2, 10);
    c(a, b, 2, 1);
    c(a, b, 3, 1);
    return b
});
mejs.MediaFeatures = {
    init: function() {
        var a = this,
            b = document,
            c = mejs.PluginDetector.nav,
            d = mejs.PluginDetector.ua.toLowerCase(),
            e, g = ["source", "track", "audio", "video"];
        a.isiPad = d.match(/ipad/i) !== null;
        a.isiPhone = d.match(/iphone/i) !== null;
        a.isiOS = a.isiPhone || a.isiPad;
        a.isAndroid = d.match(/android/i) !== null;
        a.isBustedAndroid = d.match(/android 2\.[12]/) !== null;
        a.isIE = c.appName.toLowerCase().indexOf("microsoft") != -1;
        a.isChrome = d.match(/chrome/gi) !== null;
        a.isFirefox = d.match(/firefox/gi) !== null;
        a.isWebkit = d.match(/webkit/gi) !==
            null;
        a.isGecko = d.match(/gecko/gi) !== null && !a.isWebkit;
        a.isOpera = d.match(/opera/gi) !== null;
        a.hasTouch = "ontouchstart" in window;
        for (c = 0; c < g.length; c++) e = document.createElement(g[c]);
        a.supportsMediaTag = typeof e.canPlayType !== "undefined" || a.isBustedAndroid;
        a.hasSemiNativeFullScreen = typeof e.webkitEnterFullscreen !== "undefined";
        a.hasWebkitNativeFullScreen = typeof e.webkitRequestFullScreen !== "undefined";
        a.hasMozNativeFullScreen = typeof e.mozRequestFullScreen !== "undefined";
        a.hasTrueNativeFullScreen = a.hasWebkitNativeFullScreen ||
            a.hasMozNativeFullScreen;
        a.nativeFullScreenEnabled = a.hasTrueNativeFullScreen;
        if (a.hasMozNativeFullScreen) a.nativeFullScreenEnabled = e.mozFullScreenEnabled;
        if (this.isChrome) a.hasSemiNativeFullScreen = false;
        if (a.hasTrueNativeFullScreen) {
            a.fullScreenEventName = a.hasWebkitNativeFullScreen ? "webkitfullscreenchange" : "mozfullscreenchange";
            a.isFullScreen = function() {
                if (e.mozRequestFullScreen) return b.mozFullScreen;
                else if (e.webkitRequestFullScreen) return b.webkitIsFullScreen
            };
            a.requestFullScreen = function(f) {
                if (a.hasWebkitNativeFullScreen) f.webkitRequestFullScreen();
                else a.hasMozNativeFullScreen && f.mozRequestFullScreen()
            };
            a.cancelFullScreen = function() {
                if (a.hasWebkitNativeFullScreen) document.webkitCancelFullScreen();
                else a.hasMozNativeFullScreen && document.mozCancelFullScreen()
            }
        }
        if (a.hasSemiNativeFullScreen && d.match(/mac os x 10_5/i)) {
            a.hasNativeFullScreen = false;
            a.hasSemiNativeFullScreen = false
        }
    }
};
mejs.MediaFeatures.init();
mejs.HtmlMediaElement = {
    pluginType: "native",
    isFullScreen: false,
    setCurrentTime: function(a) {
        this.currentTime = a
    },
    setMuted: function(a) {
        this.muted = a
    },
    setVolume: function(a) {
        this.volume = a
    },
    stop: function() {
        this.pause()
    },
    setSrc: function(a) {
        for (var b = this.getElementsByTagName("source"); b.length > 0;) this.removeChild(b[0]);
        if (typeof a == "string") this.src = a;
        else {
            var c;
            for (b = 0; b < a.length; b++) {
                c = a[b];
                if (this.canPlayType(c.type)) this.src = c.src
            }
        }
    },
    setVideoSize: function(a, b) {
        this.width = a;
        this.height = b
    }
};
mejs.PluginMediaElement = function(a, b, c) {
    this.id = a;
    this.pluginType = b;
    this.src = c;
    this.events = {}
};
mejs.PluginMediaElement.prototype = {
    pluginElement: null,
    pluginType: "",
    isFullScreen: false,
    playbackRate: -1,
    defaultPlaybackRate: -1,
    seekable: [],
    played: [],
    paused: true,
    ended: false,
    seeking: false,
    duration: 0,
    error: null,
    tagName: "",
    muted: false,
    volume: 1,
    currentTime: 0,
    play: function() {
        if (this.pluginApi != null) {
            this.pluginType == "youtube" ? this.pluginApi.playVideo() : this.pluginApi.playMedia();
            this.paused = false
        }
    },
    load: function() {
        if (this.pluginApi != null) {
            this.pluginType != "youtube" && this.pluginApi.loadMedia();
            this.paused =
                false
        }
    },
    pause: function() {
        if (this.pluginApi != null) {
            this.pluginType == "youtube" ? this.pluginApi.pauseVideo() : this.pluginApi.pauseMedia();
            this.paused = true
        }
    },
    stop: function() {
        if (this.pluginApi != null) {
            this.pluginType == "youtube" ? this.pluginApi.stopVideo() : this.pluginApi.stopMedia();
            this.paused = true
        }
    },
    canPlayType: function(a) {
        var b, c, d, e = mejs.plugins[this.pluginType];
        for (b = 0; b < e.length; b++) {
            d = e[b];
            if (mejs.PluginDetector.hasPluginVersion(this.pluginType, d.version))
                for (c = 0; c < d.types.length; c++)
                    if (a == d.types[c]) return true
        }
        return false
    },
    positionFullscreenButton: function(a, b, c) {
        this.pluginApi != null && this.pluginApi.positionFullscreenButton && this.pluginApi.positionFullscreenButton(a, b, c)
    },
    hideFullscreenButton: function() {
        this.pluginApi != null && this.pluginApi.hideFullscreenButton && this.pluginApi.hideFullscreenButton()
    },
    setSrc: function(a) {
        if (typeof a == "string") {
            this.pluginApi.setSrc(mejs.Utility.absolutizeUrl(a));
            this.src = mejs.Utility.absolutizeUrl(a)
        } else {
            var b, c;
            for (b = 0; b < a.length; b++) {
                c = a[b];
                if (this.canPlayType(c.type)) {
                    this.pluginApi.setSrc(mejs.Utility.absolutizeUrl(c.src));
                    this.src = mejs.Utility.absolutizeUrl(a)
                }
            }
        }
    },
    setCurrentTime: function(a) {
        if (this.pluginApi != null) {
            this.pluginType == "youtube" ? this.pluginApi.seekTo(a) : this.pluginApi.setCurrentTime(a);
            this.currentTime = a
        }
    },
    setVolume: function(a) {
        if (this.pluginApi != null) {
            this.pluginType == "youtube" ? this.pluginApi.setVolume(a * 100) : this.pluginApi.setVolume(a);
            this.volume = a
        }
    },
    setMuted: function(a) {
        if (this.pluginApi != null) {
            if (this.pluginType == "youtube") {
                a ? this.pluginApi.mute() : this.pluginApi.unMute();
                this.muted = a;
                this.dispatchEvent("volumechange")
            } else this.pluginApi.setMuted(a);
            this.muted = a
        }
    },
    setVideoSize: function(a, b) {
        if (this.pluginElement.style) {
            this.pluginElement.style.width = a + "px";
            this.pluginElement.style.height = b + "px"
        }
        this.pluginApi != null && this.pluginApi.setVideoSize && this.pluginApi.setVideoSize(a, b)
    },
    setFullscreen: function(a) {
        this.pluginApi != null && this.pluginApi.setFullscreen && this.pluginApi.setFullscreen(a)
    },
    enterFullScreen: function() {
        this.pluginApi != null && this.pluginApi.setFullscreen && this.setFullscreen(true)
    },
    exitFullScreen: function() {
        this.pluginApi != null && this.pluginApi.setFullscreen &&
            this.setFullscreen(false)
    },
    addEventListener: function(a, b) {
        this.events[a] = this.events[a] || [];
        this.events[a].push(b)
    },
    removeEventListener: function(a, b) {
        if (!a) {
            this.events = {};
            return true
        }
        var c = this.events[a];
        if (!c) return true;
        if (!b) {
            this.events[a] = [];
            return true
        }
        for (i = 0; i < c.length; i++)
            if (c[i] === b) {
                this.events[a].splice(i, 1);
                return true
            }
        return false
    },
    dispatchEvent: function(a) {
        var b, c, d = this.events[a];
        if (d) {
            c = Array.prototype.slice.call(arguments, 1);
            for (b = 0; b < d.length; b++) d[b].apply(null, c)
        }
    },
    attributes: {},
    hasAttribute: function(a) {
        return a in this.attributes
    },
    removeAttribute: function(a) {
        delete this.attributes[a]
    },
    getAttribute: function(a) {
        if (this.hasAttribute(a)) return this.attributes[a];
        return ""
    },
    setAttribute: function(a, b) {
        this.attributes[a] = b
    },
    remove: function() {
        mejs.Utility.removeSwf(this.pluginElement.id)
    }
};
mejs.MediaPluginBridge = {
    pluginMediaElements: {},
    htmlMediaElements: {},
    registerPluginElement: function(a, b, c) {
        this.pluginMediaElements[a] = b;
        this.htmlMediaElements[a] = c
    },
    initPlugin: function(a) {
        var b = this.pluginMediaElements[a],
            c = this.htmlMediaElements[a];
        if (b) {
            switch (b.pluginType) {
                case "flash":
                    b.pluginElement = b.pluginApi = document.getElementById(a);
                    break;
                case "silverlight":
                    b.pluginElement = document.getElementById(b.id);
                    b.pluginApi = b.pluginElement.Content.MediaElementJS
            }
            b.pluginApi != null && b.success && b.success(b,
                c)
        }
    },
    fireEvent: function(a, b, c) {
        var d, e;
        a = this.pluginMediaElements[a];
        a.ended = false;
        a.paused = true;
        b = {
            type: b,
            target: a
        };
        for (d in c) {
            a[d] = c[d];
            b[d] = c[d]
        }
        e = c.bufferedTime || 0;
        b.target.buffered = b.buffered = {
            start: function() {
                return 0
            },
            end: function() {
                return e
            },
            length: 1
        };
        a.dispatchEvent(b.type, b)
    }
};
mejs.MediaElementDefaults = {
    mode: "auto",
    plugins: ["flash", "silverlight", "youtube", "vimeo"],
    enablePluginDebug: false,
    type: "",
    pluginPath: mejs.Utility.getScriptPath(["mediaelement.js", "mediaelement.min.js", "mediaelement-and-player.js", "mediaelement-and-player.min.js"]),
    flashName: "flashmediaelement.swf",
    enablePluginSmoothing: false,
    silverlightName: "silverlightmediaelement.xap",
    defaultVideoWidth: 480,
    defaultVideoHeight: 270,
    pluginWidth: -1,
    pluginHeight: -1,
    pluginVars: [],
    timerRate: 250,
    startVolume: 0.8,
    success: function() {},
    error: function() {}
};
mejs.MediaElement = function(a, b) {
    return mejs.HtmlMediaElementShim.create(a, b)
};
mejs.HtmlMediaElementShim = {
    create: function(a, b) {
        var c = mejs.MediaElementDefaults,
            d = typeof a == "string" ? document.getElementById(a) : a,
            e = d.tagName.toLowerCase(),
            g = e === "audio" || e === "video",
            f = g ? d.getAttribute("src") : d.getAttribute("href");
        e = d.getAttribute("poster");
        var j = d.getAttribute("autoplay"),
            h = d.getAttribute("preload"),
            l = d.getAttribute("controls"),
            k;
        for (k in b) c[k] = b[k];
        f = typeof f == "undefined" || f === null || f == "" ? null : f;
        e = typeof e == "undefined" || e === null ? "" : e;
        h = typeof h == "undefined" || h === null || h === "false" ?
            "none" : h;
        j = !(typeof j == "undefined" || j === null || j === "false");
        l = !(typeof l == "undefined" || l === null || l === "false");
        k = this.determinePlayback(d, c, mejs.MediaFeatures.supportsMediaTag, g, f);
        k.url = k.url !== null ? mejs.Utility.absolutizeUrl(k.url) : "";
        if (k.method == "native") {
            if (mejs.MediaFeatures.isBustedAndroid) {
                d.src = k.url;
                d.addEventListener("click", function() {
                    d.play()
                }, false)
            }
            return this.updateNative(k, c, j, h)
        } else if (k.method !== "") return this.createPlugin(k, c, e, j, h, l);
        else {
            this.createErrorMessage(k, c, e);
            return this
        }
    },
    determinePlayback: function(a, b, c, d, e) {
        var g = [],
            f, j, h = {
                method: "",
                url: "",
                htmlMediaElement: a,
                isVideo: a.tagName.toLowerCase() != "audio"
            },
            l, k;
        if (typeof b.type != "undefined" && b.type !== "")
            if (typeof b.type == "string") g.push({
                type: b.type,
                url: e
            });
            else
                for (f = 0; f < b.type.length; f++) g.push({
                    type: b.type[f],
                    url: e
                });
        else if (e !== null) {
            j = this.formatType(e, a.getAttribute("type"));
            g.push({
                type: j,
                url: e
            })
        } else
            for (f = 0; f < a.childNodes.length; f++) {
                j = a.childNodes[f];
                if (j.nodeType == 1 && j.tagName.toLowerCase() == "source") {
                    e = j.getAttribute("src");
                    j = this.formatType(e, j.getAttribute("type"));
                    g.push({
                        type: j,
                        url: e
                    })
                }
            }
        if (!d && g.length > 0 && g[0].url !== null && this.getTypeFromFile(g[0].url).indexOf("audio") > -1) h.isVideo = false;
        if (mejs.MediaFeatures.isBustedAndroid) a.canPlayType = function(m) {
            return m.match(/video\/(mp4|m4v)/gi) !== null ? "maybe" : ""
        };
        if (c && (b.mode === "auto" || b.mode === "native")) {
            if (!d) {
                f = document.createElement(h.isVideo ? "video" : "audio");
                a.parentNode.insertBefore(f, a);
                a.style.display = "none";
                h.htmlMediaElement = a = f
            }
            for (f = 0; f < g.length; f++)
                if (a.canPlayType(g[f].type).replace(/no/,
                        "") !== "" || a.canPlayType(g[f].type.replace(/mp3/, "mpeg")).replace(/no/, "") !== "") {
                    h.method = "native";
                    h.url = g[f].url;
                    break
                }
            if (h.method === "native") {
                if (h.url !== null) a.src = h.url;
                return h
            }
        }
        if (b.mode === "auto" || b.mode === "shim")
            for (f = 0; f < g.length; f++) {
                j = g[f].type;
                for (a = 0; a < b.plugins.length; a++) {
                    e = b.plugins[a];
                    l = mejs.plugins[e];
                    for (c = 0; c < l.length; c++) {
                        k = l[c];
                        if (k.version == null || mejs.PluginDetector.hasPluginVersion(e, k.version))
                            for (d = 0; d < k.types.length; d++)
                                if (j == k.types[d]) {
                                    h.method = e;
                                    h.url = g[f].url;
                                    return h
                                }
                    }
                }
            }
        if (h.method ===
            "" && g.length > 0) h.url = g[0].url;
        return h
    },
    formatType: function(a, b) {
        return a && !b ? this.getTypeFromFile(a) : b && ~b.indexOf(";") ? b.substr(0, b.indexOf(";")) : b
    },
    getTypeFromFile: function(a) {
        a = a.substring(a.lastIndexOf(".") + 1);
        return (/(mp4|m4v|ogg|ogv|webm|flv|wmv|mpeg|mov)/gi.test(a) ? "video" : "audio") + "/" + a
    },
    createErrorMessage: function(a, b, c) {
        var d = a.htmlMediaElement,
            e = document.createElement("div");
        e.className = "me-cannotplay";
        try {
            e.style.width = d.width + "px";
            e.style.height = d.height + "px"
        } catch (g) {}
        e.innerHTML = c !==
            "" ? '<a href="' + a.url + '"><img src="' + c + '" width="100%" height="100%" /></a>' : '<a href="' + a.url + '"><span>Download File</span></a>';
        d.parentNode.insertBefore(e, d);
        d.style.display = "none";
        b.error(d)
    },
    createPlugin: function(a, b, c, d, e, g) {
        c = a.htmlMediaElement;
        var f = 1,
            j = 1,
            h = "me_" + a.method + "_" + mejs.meIndex++,
            l = new mejs.PluginMediaElement(h, a.method, a.url),
            k = document.createElement("div"),
            m;
        l.tagName = c.tagName;
        for (m = 0; m < c.attributes.length; m++) {
            var n = c.attributes[m];
            n.specified == true && l.setAttribute(n.name, n.value)
        }
        for (m =
            c.parentNode; m !== null && m.tagName.toLowerCase() != "body";) {
            if (m.parentNode.tagName.toLowerCase() == "p") {
                m.parentNode.parentNode.insertBefore(m, m.parentNode);
                break
            }
            m = m.parentNode
        }
        if (a.isVideo) {
            f = b.videoWidth > 0 ? b.videoWidth : c.getAttribute("width") !== null ? c.getAttribute("width") : b.defaultVideoWidth;
            j = b.videoHeight > 0 ? b.videoHeight : c.getAttribute("height") !== null ? c.getAttribute("height") : b.defaultVideoHeight;
            f = mejs.Utility.encodeUrl(f);
            j = mejs.Utility.encodeUrl(j)
        } else if (b.enablePluginDebug) {
            f = 320;
            j = 240
        }
        l.success =
            b.success;
        mejs.MediaPluginBridge.registerPluginElement(h, l, c);
        k.className = "me-plugin";
        k.id = h + "_container";
        a.isVideo ? c.parentNode.insertBefore(k, c) : document.body.insertBefore(k, document.body.childNodes[0]);
        d = ["id=" + h, "isvideo=" + (a.isVideo ? "true" : "false"), "autoplay=" + (d ? "true" : "false"), "preload=" + e, "width=" + f, "startvolume=" + b.startVolume, "timerrate=" + b.timerRate, "height=" + j];
        if (a.url !== null) a.method == "flash" ? d.push("file=" + mejs.Utility.encodeUrl(a.url)) : d.push("file=" + a.url);
        b.enablePluginDebug && d.push("debug=true");
        b.enablePluginSmoothing && d.push("smoothing=true");
        g && d.push("controls=true");
        if (b.pluginVars) d = d.concat(b.pluginVars);
        switch (a.method) {
            case "silverlight":
                k.innerHTML = '<object data="data:application/x-silverlight-2," type="application/x-silverlight-2" id="' + h + '" name="' + h + '" width="' + f + '" height="' + j + '"><param name="initParams" value="' + d.join(",") + '" /><param name="windowless" value="true" /><param name="background" value="black" /><param name="minRuntimeVersion" value="3.0.0.0" /><param name="autoUpgrade" value="true" /><param name="source" value="' +
                    b.pluginPath + b.silverlightName + '" /></object>';
                break;
            case "flash":
                if (mejs.MediaFeatures.isIE) {
                    a = document.createElement("div");
                    k.appendChild(a);
                    a.outerHTML = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="//download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab" id="' + h + '" width="' + f + '" height="' + j + '"><param name="movie" value="' + b.pluginPath + b.flashName + "?x=" + new Date + '" /><param name="flashvars" value="' + d.join("&amp;") + '" /><param name="quality" value="high" /><param name="bgcolor" value="#000000" /><param name="wmode" value="transparent" /><param name="allowScriptAccess" value="always" /><param name="allowFullScreen" value="true" /></object>'
                } else k.innerHTML =
                    '<embed id="' + h + '" name="' + h + '" play="true" loop="false" quality="high" bgcolor="#000000" wmode="transparent" allowScriptAccess="always" allowFullScreen="true" type="application/x-shockwave-flash" pluginspage="//www.macromedia.com/go/getflashplayer" src="' + b.pluginPath + b.flashName + '" flashvars="' + d.join("&") + '" width="' + f + '" height="' + j + '"></embed>';
                break;
            case "youtube":
                b = a.url.substr(a.url.lastIndexOf("=") + 1);
                youtubeSettings = {
                    container: k,
                    containerId: k.id,
                    pluginMediaElement: l,
                    pluginId: h,
                    videoId: b,
                    height: j,
                    width: f
                };
                mejs.PluginDetector.hasPluginVersion("flash", [10, 0, 0]) ? mejs.YouTubeApi.createFlash(youtubeSettings) : mejs.YouTubeApi.enqueueIframe(youtubeSettings);
                break;
            case "vimeo":
                console.log("vimeoid");
                l.vimeoid = a.url.substr(a.url.lastIndexOf("/") + 1);
                k.innerHTML = '<object width="' + f + '" height="' + j + '"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="flashvars" value="api=1" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=' +
                    l.vimeoid + '&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" /><embed src="//vimeo.com/moogaloop.swf?api=1&amp;clip_id=' + l.vimeoid + '&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="' + f + '" height="' + j + '"></embed></object>'
        }
        c.style.display =
            "none";
        return l
    },
    updateNative: function(a, b) {
        var c = a.htmlMediaElement,
            d;
        for (d in mejs.HtmlMediaElement) c[d] = mejs.HtmlMediaElement[d];
        b.success(c, c);
        return c
    }
};
mejs.YouTubeApi = {
    isIframeStarted: false,
    isIframeLoaded: false,
    loadIframeApi: function() {
        if (!this.isIframeStarted) {
            var a = document.createElement("script");
            a.src = "http://www.youtube.com/player_api";
            var b = document.getElementsByTagName("script")[0];
            b.parentNode.insertBefore(a, b);
            this.isIframeStarted = true
        }
    },
    iframeQueue: [],
    enqueueIframe: function(a) {
        if (this.isLoaded) this.createIframe(a);
        else {
            this.loadIframeApi();
            this.iframeQueue.push(a)
        }
    },
    createIframe: function(a) {
        var b = a.pluginMediaElement,
            c = new YT.Player(a.containerId, {
                height: a.height,
                width: a.width,
                videoId: a.videoId,
                playerVars: {
                    controls: 0
                },
                events: {
                    onReady: function() {
                        a.pluginMediaElement.pluginApi = c;
                        mejs.MediaPluginBridge.initPlugin(a.pluginId);
                        setInterval(function() {
                            mejs.YouTubeApi.createEvent(c, b, "timeupdate")
                        }, 250)
                    },
                    onStateChange: function(d) {
                        mejs.YouTubeApi.handleStateChange(d.data, c, b)
                    }
                }
            })
    },
    createEvent: function(a, b, c) {
        c = {
            type: c,
            target: b
        };
        if (a && a.getDuration) {
            b.currentTime = c.currentTime = a.getCurrentTime();
            b.duration = c.duration = a.getDuration();
            c.paused = b.paused;
            c.ended = b.ended;
            c.muted = a.isMuted();
            c.volume = a.getVolume() / 100;
            c.bytesTotal = a.getVideoBytesTotal();
            c.bufferedBytes = a.getVideoBytesLoaded();
            var d = c.bufferedBytes / c.bytesTotal * c.duration;
            c.target.buffered = c.buffered = {
                start: function() {
                    return 0
                },
                end: function() {
                    return d
                },
                length: 1
            }
        }
        b.dispatchEvent(c.type, c)
    },
    iFrameReady: function() {
        for (this.isIframeLoaded = this.isLoaded = true; this.iframeQueue.length > 0;) this.createIframe(this.iframeQueue.pop())
    },
    flashPlayers: {},
    createFlash: function(a) {
        this.flashPlayers[a.pluginId] =
            a;
        var b, c = "http://www.youtube.com/apiplayer?enablejsapi=1&amp;playerapiid=" + a.pluginId + "&amp;version=3&amp;autoplay=0&amp;controls=0&amp;modestbranding=1&loop=0";
        if (mejs.MediaFeatures.isIE) {
            b = document.createElement("div");
            a.container.appendChild(b);
            b.outerHTML = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="//download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab" id="' + a.pluginId + '" width="' + a.width + '" height="' + a.height + '"><param name="movie" value="' + c + '" /><param name="wmode" value="transparent" /><param name="allowScriptAccess" value="always" /><param name="allowFullScreen" value="true" /></object>'
        } else a.container.innerHTML =
            '<object type="application/x-shockwave-flash" id="' + a.pluginId + '" data="' + c + '" width="' + a.width + '" height="' + a.height + '" style="visibility: visible; "><param name="allowScriptAccess" value="always"><param name="wmode" value="transparent"></object>'
    },
    flashReady: function(a) {
        var b = this.flashPlayers[a],
            c = document.getElementById(a),
            d = b.pluginMediaElement;
        d.pluginApi = d.pluginElement = c;
        mejs.MediaPluginBridge.initPlugin(a);
        c.cueVideoById(b.videoId);
        a = b.containerId + "_callback";
        window[a] = function(e) {
            mejs.YouTubeApi.handleStateChange(e,
                c, d)
        };
        c.addEventListener("onStateChange", a);
        setInterval(function() {
            mejs.YouTubeApi.createEvent(c, d, "timeupdate")
        }, 250)
    },
    handleStateChange: function(a, b, c) {
        switch (a) {
            case -1:
                c.paused = true;
                c.ended = true;
                mejs.YouTubeApi.createEvent(b, c, "loadedmetadata");
                break;
            case 0:
                c.paused = false;
                c.ended = true;
                mejs.YouTubeApi.createEvent(b, c, "ended");
                break;
            case 1:
                c.paused = false;
                c.ended = false;
                mejs.YouTubeApi.createEvent(b, c, "play");
                mejs.YouTubeApi.createEvent(b, c, "playing");
                break;
            case 2:
                c.paused = true;
                c.ended = false;
                mejs.YouTubeApi.createEvent(b,
                    c, "pause");
                break;
            case 3:
                mejs.YouTubeApi.createEvent(b, c, "progress")
        }
    }
};

function onYouTubePlayerAPIReady() {
    mejs.YouTubeApi.iFrameReady()
}

function onYouTubePlayerReady(a) {
    mejs.YouTubeApi.flashReady(a)
}
window.mejs = mejs;
window.MediaElement = mejs.MediaElement;

/*!
 * MediaElementPlayer
 * http://mediaelementjs.com/
 *
 * Creates a controller bar for HTML5 <video> add <audio> tags
 * using jQuery and MediaElement.js (HTML5 Flash/Silverlight wrapper)
 *
 * Copyright 2010-2012, John Dyer (http://j.hn/)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 */
if (typeof jQuery != "undefined") mejs.$ = jQuery;
else if (typeof ender != "undefined") mejs.$ = ender;
(function(f) {
    mejs.MepDefaults = {
        poster: "",
        defaultVideoWidth: 480,
        defaultVideoHeight: 270,
        videoWidth: -1,
        videoHeight: -1,
        defaultAudioWidth: 400,
        defaultAudioHeight: 30,
        audioWidth: -1,
        audioHeight: -1,
        startVolume: 0.8,
        loop: false,
        enableAutosize: true,
        alwaysShowHours: false,
        showTimecodeFrameCount: false,
        framesPerSecond: 25,
        autosizeProgress: true,
        alwaysShowControls: false,
        iPadUseNativeControls: false,
        iPhoneUseNativeControls: false,
        AndroidUseNativeControls: false,
        features: ["playpause", "current", "progress", "duration", "tracks",
            "volume", "fullscreen"
        ],
        isVideo: true,
        enableKeyboard: true,
        pauseOtherPlayers: true,
        keyActions: [{
                keys: [32, 179],
                action: function(a, c) {
                    c.paused || c.ended ? c.play() : c.pause()
                }
            }, {
                keys: [38],
                action: function(a, c) {
                    c.setVolume(Math.min(c.volume + 0.1, 1))
                }
            }, {
                keys: [40],
                action: function(a, c) {
                    c.setVolume(Math.max(c.volume - 0.1, 0))
                }
            }, {
                keys: [37, 227],
                action: function(a, c) {
                    if (!isNaN(c.duration) && c.duration > 0) {
                        if (a.isVideo) {
                            a.showControls();
                            a.startControlsTimer()
                        }
                        c.setCurrentTime(Math.min(c.currentTime - c.duration * 0.05, c.duration))
                    }
                }
            },
            {
                keys: [39, 228],
                action: function(a, c) {
                    if (!isNaN(c.duration) && c.duration > 0) {
                        if (a.isVideo) {
                            a.showControls();
                            a.startControlsTimer()
                        }
                        c.setCurrentTime(Math.max(c.currentTime + c.duration * 0.05, 0))
                    }
                }
            }, {
                keys: [70],
                action: function(a) {
                    if (typeof a.enterFullScreen != "undefined") a.isFullScreen ? a.exitFullScreen() : a.enterFullScreen()
                }
            }
        ]
    };
    mejs.mepIndex = 0;
    mejs.players = [];
    mejs.MediaElementPlayer = function(a, c) {
        if (!(this instanceof mejs.MediaElementPlayer)) return new mejs.MediaElementPlayer(a, c);
        this.$media = this.$node = f(a);
        this.node = this.media = this.$media[0];
        if (typeof this.node.player != "undefined") return this.node.player;
        else this.node.player = this;
        if (typeof c == "undefined") c = this.$node.data("mejsoptions");
        this.options = f.extend({}, mejs.MepDefaults, c);
        mejs.players.push(this);
        this.init();
        return this
    };
    mejs.MediaElementPlayer.prototype = {
        hasFocus: false,
        controlsAreVisible: true,
        init: function() {
            var a = this,
                c = mejs.MediaFeatures,
                b = f.extend(true, {}, a.options, {
                    success: function(e, g) {
                        a.meReady(e, g)
                    },
                    error: function(e) {
                        a.handleError(e)
                    }
                }),
                d = a.media.tagName.toLowerCase();
            a.isDynamic = d !== "audio" && d !== "video";
            a.isVideo = a.isDynamic ? a.options.isVideo : d !== "audio" && a.options.isVideo;
            if (c.isiPad && a.options.iPadUseNativeControls || c.isiPhone && a.options.iPhoneUseNativeControls) {
                a.$media.attr("controls", "controls");
                if (c.isiPad && a.media.getAttribute("autoplay") !== null) {
                    a.media.load();
                    a.media.play()
                }
            } else if (!(c.isAndroid && a.AndroidUseNativeControls)) {
                a.$media.removeAttr("controls");
                a.id = "mep_" + mejs.mepIndex++;
                a.container = f('<div id="' + a.id + '" class="mejs-container"><div class="mejs-inner"><div class="mejs-mediaelement"></div><div class="mejs-layers"></div><div class="mejs-controls"></div><div class="mejs-clear"></div></div></div>').addClass(a.$media[0].className).insertBefore(a.$media);
                a.container.addClass((c.isAndroid ? "mejs-android " : "") + (c.isiOS ? "mejs-ios " : "") + (c.isiPad ? "mejs-ipad " : "") + (c.isiPhone ? "mejs-iphone " : "") + (a.isVideo ? "mejs-video " : "mejs-audio "));
                if (c.isiOS) {
                    c = a.$media.clone();
                    a.container.find(".mejs-mediaelement").append(c);
                    a.$media.remove();
                    a.$node = a.$media = c;
                    a.node = a.media = c[0]
                } else a.container.find(".mejs-mediaelement").append(a.$media);
                a.controls = a.container.find(".mejs-controls");
                a.layers = a.container.find(".mejs-layers");
                c = d.substring(0, 1).toUpperCase() + d.substring(1);
                a.width = a.options[d + "Width"] > 0 || a.options[d + "Width"].toString().indexOf("%") > -1 ? a.options[d + "Width"] : a.media.style.width !== "" && a.media.style.width !== null ? a.media.style.width : a.media.getAttribute("width") !== null ? a.$media.attr("width") : a.options["default" + c + "Width"];
                a.height = a.options[d + "Height"] > 0 || a.options[d + "Height"].toString().indexOf("%") > -1 ? a.options[d + "Height"] : a.media.style.height !== "" && a.media.style.height !== null ? a.media.style.height : a.$media[0].getAttribute("height") !== null ? a.$media.attr("height") :
                    a.options["default" + c + "Height"];
                a.setPlayerSize(a.width, a.height);
                b.pluginWidth = a.height;
                b.pluginHeight = a.width
            }
            mejs.MediaElement(a.$media[0], b)
        },
        showControls: function(a) {
            var c = this;
            a = typeof a == "undefined" || a;
            if (!c.controlsAreVisible) {
                if (a) {
                    c.controls.css("visibility", "visible").stop(true, true).fadeIn(200, function() {
                        c.controlsAreVisible = true
                    });
                    c.container.find(".mejs-control").css("visibility", "visible").stop(true, true).fadeIn(200, function() {
                        c.controlsAreVisible = true
                    })
                } else {
                    c.controls.css("visibility",
                        "visible").css("display", "block");
                    c.container.find(".mejs-control").css("visibility", "visible").css("display", "block");
                    c.controlsAreVisible = true
                }
                c.setControlsSize()
            }
        },
        hideControls: function(a) {
            var c = this;
            a = typeof a == "undefined" || a;
            if (c.controlsAreVisible)
                if (a) {
                    c.controls.stop(true, true).fadeOut(200, function() {
                        f(this).css("visibility", "hidden").css("display", "block");
                        c.controlsAreVisible = false
                    });
                    c.container.find(".mejs-control").stop(true, true).fadeOut(200, function() {
                        f(this).css("visibility", "hidden").css("display",
                            "block")
                    })
                } else {
                    c.controls.css("visibility", "hidden").css("display", "block");
                    c.container.find(".mejs-control").css("visibility", "hidden").css("display", "block");
                    c.controlsAreVisible = false
                }
        },
        controlsTimer: null,
        startControlsTimer: function(a) {
            var c = this;
            a = typeof a != "undefined" ? a : 1500;
            c.killControlsTimer("start");
            c.controlsTimer = setTimeout(function() {
                c.hideControls();
                c.killControlsTimer("hide")
            }, a)
        },
        killControlsTimer: function() {
            if (this.controlsTimer !== null) {
                clearTimeout(this.controlsTimer);
                delete this.controlsTimer;
                this.controlsTimer = null
            }
        },
        controlsEnabled: true,
        disableControls: function() {
            this.killControlsTimer();
            this.hideControls(false);
            this.controlsEnabled = false
        },
        enableControls: function() {
            this.showControls(false);
            this.controlsEnabled = true
        },
        meReady: function(a, c) {
            var b = this,
                d = mejs.MediaFeatures,
                e = c.getAttribute("autoplay");
            e = !(typeof e == "undefined" || e === null || e === "false");
            var g;
            if (!b.created) {
                b.created = true;
                b.media = a;
                b.domNode = c;
                if (!(d.isAndroid && b.options.AndroidUseNativeControls) && !(d.isiPad && b.options.iPadUseNativeControls) &&
                    !(d.isiPhone && b.options.iPhoneUseNativeControls)) {
                    b.buildposter(b, b.controls, b.layers, b.media);
                    b.buildkeyboard(b, b.controls, b.layers, b.media);
                    b.buildoverlays(b, b.controls, b.layers, b.media);
                    b.findTracks();
                    for (g in b.options.features) {
                        d = b.options.features[g];
                        if (b["build" + d]) try {
                            b["build" + d](b, b.controls, b.layers, b.media)
                        } catch (k) {}
                    }
                    b.container.trigger("controlsready");
                    b.setPlayerSize(b.width, b.height);
                    b.setControlsSize();
                    if (b.isVideo) {
                        if (mejs.MediaFeatures.hasTouch) b.$media.bind("touchstart", function() {
                            if (b.controlsAreVisible) b.hideControls(false);
                            else b.controlsEnabled && b.showControls(false)
                        });
                        else {
                            (b.media.pluginType == "native" ? b.$media : f(b.media.pluginElement)).click(function() {
                                a.paused ? a.play() : a.pause()
                            });
                            b.container.bind("mouseenter mouseover", function() {
                                if (b.controlsEnabled)
                                    if (!b.options.alwaysShowControls) {
                                        b.killControlsTimer("enter");
                                        b.showControls();
                                        b.startControlsTimer(2500)
                                    }
                            }).bind("mousemove", function() {
                                if (b.controlsEnabled) {
                                    b.controlsAreVisible || b.showControls();
                                    b.options.alwaysShowControls || b.startControlsTimer(2500)
                                }
                            }).bind("mouseleave",
                                function() {
                                    b.controlsEnabled && !b.media.paused && !b.options.alwaysShowControls && b.startControlsTimer(1E3)
                                })
                        }
                        e && !b.options.alwaysShowControls && b.hideControls();
                        b.options.enableAutosize && b.media.addEventListener("loadedmetadata", function(h) {
                            if (b.options.videoHeight <= 0 && b.domNode.getAttribute("height") === null && !isNaN(h.target.videoHeight)) {
                                b.setPlayerSize(h.target.videoWidth, h.target.videoHeight);
                                b.setControlsSize();
                                b.media.setVideoSize(h.target.videoWidth, h.target.videoHeight)
                            }
                        }, false)
                    }
                    a.addEventListener("play",
                        function() {
                            for (var h = 0, o = mejs.players.length; h < o; h++) {
                                var n = mejs.players[h];
                                n.id != b.id && b.options.pauseOtherPlayers && !n.paused && !n.ended && n.pause();
                                n.hasFocus = false
                            }
                            b.hasFocus = true
                        }, false);
                    b.media.addEventListener("ended", function() {
                        try {
                            b.media.setCurrentTime(0)
                        } catch (h) {}
                        b.media.pause();
                        b.setProgressRail && b.setProgressRail();
                        b.setCurrentRail && b.setCurrentRail();
                        if (b.options.loop) b.media.play();
                        else !b.options.alwaysShowControls && b.controlsEnabled && b.showControls()
                    }, false);
                    b.media.addEventListener("loadedmetadata",
                        function() {
                            b.updateDuration && b.updateDuration();
                            b.updateCurrent && b.updateCurrent();
                            if (!b.isFullScreen) {
                                b.setPlayerSize(b.width, b.height);
                                b.setControlsSize()
                            }
                        }, false);
                    setTimeout(function() {
                        b.setPlayerSize(b.width, b.height);
                        b.setControlsSize()
                    }, 50);
                    f(window).resize(function() {
                        b.isFullScreen || mejs.MediaFeatures.hasTrueNativeFullScreen && document.webkitIsFullScreen || b.setPlayerSize(b.width, b.height);
                        b.setControlsSize()
                    });
                    b.media.pluginType == "youtube" && b.container.find(".mejs-overlay-play").hide()
                }
                if (e &&
                    a.pluginType == "native") {
                    a.load();
                    a.play()
                }
                if (b.options.success) typeof b.options.success == "string" ? window[b.options.success](b.media, b.domNode, b) : b.options.success(b.media, b.domNode, b)
            }
        },
        handleError: function(a) {
            this.controls.hide();
            this.options.error && this.options.error(a)
        },
        setPlayerSize: function(a, c) {
            if (typeof a != "undefined") this.width = a;
            if (typeof c != "undefined") this.height = c;
            if (this.height.toString().indexOf("%") > 0) {
                var b = this.media.videoWidth && this.media.videoWidth > 0 ? this.media.videoWidth : this.options.defaultVideoWidth,
                    d = this.media.videoHeight && this.media.videoHeight > 0 ? this.media.videoHeight : this.options.defaultVideoHeight,
                    e = this.container.parent().width();
                b = parseInt(e * d / b, 10);
                if (this.container.parent()[0].tagName.toLowerCase() === "body") {
                    e = f(window).width();
                    b = f(window).height()
                }
                this.container.width(e).height(b);
                this.$media.width("100%").height("100%");
                this.container.find("object, embed, iframe").width("100%").height("100%");
                this.media.setVideoSize && this.media.setVideoSize(e, b);
                this.layers.children(".mejs-layer").width("100%").height("100%")
            } else {
                this.container.width(this.width).height(this.height);
                this.layers.children(".mejs-layer").width(this.width).height(this.height)
            }
        },
        setControlsSize: function() {
            var a = 0,
                c = 0,
                b = this.controls.find(".mejs-time-rail"),
                d = this.controls.find(".mejs-time-total");
            this.controls.find(".mejs-time-current");
            this.controls.find(".mejs-time-loaded");
            others = b.siblings();
            if (this.options && !this.options.autosizeProgress) c = parseInt(b.css("width"));
            if (c === 0 || !c) {
                others.each(function() {
                    if (f(this).css("position") != "absolute") a += f(this).outerWidth(true)
                });
                c = this.controls.width() -
                    a - (b.outerWidth(true) - b.outerWidth(false))
            }
            b.width(c);
            d.width(c - (d.outerWidth(true) - d.width()));
            this.setProgressRail && this.setProgressRail();
            this.setCurrentRail && this.setCurrentRail()
        },
        buildposter: function(a, c, b, d) {
            var e = f('<div class="mejs-poster mejs-layer"></div>').appendTo(b);
            c = a.$media.attr("poster");
            if (a.options.poster !== "") c = a.options.poster;
            c !== "" && c != null ? this.setPoster(c) : e.hide();
            d.addEventListener("play", function() {
                e.hide()
            }, false)
        },
        setPoster: function(a) {
            var c = this.container.find(".mejs-poster"),
                b = c.find("img");
            if (b.length == 0) b = f('<img width="100%" height="100%" />').appendTo(c);
            b.attr("src", a)
        },
        buildoverlays: function(a, c, b, d) {
            if (a.isVideo) {
                var e = f('<div class="mejs-overlay mejs-layer"><div class="mejs-overlay-loading"><span></span></div></div>').hide().appendTo(b),
                    g = f('<div class="mejs-overlay mejs-layer"><div class="mejs-overlay-error"></div></div>').hide().appendTo(b),
                    k = f('<div class="mejs-overlay mejs-layer mejs-overlay-play"><div class="mejs-overlay-button"></div></div>').appendTo(b).click(function() {
                        d.paused ?
                            d.play() : d.pause()
                    });
                d.addEventListener("play", function() {
                    k.hide();
                    e.hide();
                    g.hide()
                }, false);
                d.addEventListener("playing", function() {
                    k.hide();
                    e.hide();
                    g.hide()
                }, false);
                d.addEventListener("pause", function() {
                    mejs.MediaFeatures.isiPhone || k.show()
                }, false);
                d.addEventListener("waiting", function() {
                    e.show()
                }, false);
                d.addEventListener("loadeddata", function() {
                    e.show()
                }, false);
                d.addEventListener("canplay", function() {
                    e.hide()
                }, false);
                d.addEventListener("error", function() {
                        e.hide();
                        g.show();
                        g.find("mejs-overlay-error").html("Error loading this resource")
                    },
                    false)
            }
        },
        buildkeyboard: function(a, c, b, d) {
            f(document).keydown(function(e) {
                if (a.hasFocus && a.options.enableKeyboard)
                    for (var g = 0, k = a.options.keyActions.length; g < k; g++)
                        for (var h = a.options.keyActions[g], o = 0, n = h.keys.length; o < n; o++)
                            if (e.keyCode == h.keys[o]) {
                                e.preventDefault();
                                h.action(a, d);
                                return false
                            }
                return true
            });
            f(document).click(function(e) {
                if (f(e.target).closest(".mejs-container").length == 0) a.hasFocus = false
            })
        },
        findTracks: function() {
            var a = this,
                c = a.$media.find("track");
            a.tracks = [];
            c.each(function(b, d) {
                d =
                    f(d);
                a.tracks.push({
                    srclang: d.attr("srclang").toLowerCase(),
                    src: d.attr("src"),
                    kind: d.attr("kind"),
                    label: d.attr("label") || "",
                    entries: [],
                    isLoaded: false
                })
            })
        },
        changeSkin: function(a) {
            this.container[0].className = "mejs-container " + a;
            this.setPlayerSize(this.width, this.height);
            this.setControlsSize()
        },
        play: function() {
            this.media.play()
        },
        pause: function() {
            this.media.pause()
        },
        load: function() {
            this.media.load()
        },
        setMuted: function(a) {
            this.media.setMuted(a)
        },
        setCurrentTime: function(a) {
            this.media.setCurrentTime(a)
        },
        getCurrentTime: function() {
            return this.media.currentTime
        },
        setVolume: function(a) {
            this.media.setVolume(a)
        },
        getVolume: function() {
            return this.media.volume
        },
        setSrc: function(a) {
            this.media.setSrc(a)
        },
        remove: function() {
            if (this.media.pluginType == "flash") this.media.remove();
            else this.media.pluginTyp == "native" && this.media.prop("controls", true);
            this.isDynamic || this.$node.insertBefore(this.container);
            this.container.remove()
        }
    };
    if (typeof jQuery != "undefined") jQuery.fn.mediaelementplayer = function(a) {
        return this.each(function() {
            new mejs.MediaElementPlayer(this,
                a)
        })
    };
    f(document).ready(function() {
        f(".mejs-player").mediaelementplayer()
    });
    window.MediaElementPlayer = mejs.MediaElementPlayer
})(mejs.$);
(function(f) {
    f.extend(mejs.MepDefaults, {
        playpauseText: "Play/Pause"
    });
    f.extend(MediaElementPlayer.prototype, {
        buildplaypause: function(a, c, b, d) {
            var e = f('<div class="mejs-button mejs-playpause-button mejs-play" ><button type="button" aria-controls="' + this.id + '" title="' + this.options.playpauseText + '"></button></div>').appendTo(c).click(function(g) {
                g.preventDefault();
                d.paused ? d.play() : d.pause();
                return false
            });
            d.addEventListener("play", function() {
                e.removeClass("mejs-play").addClass("mejs-pause")
            }, false);
            d.addEventListener("playing", function() {
                e.removeClass("mejs-play").addClass("mejs-pause")
            }, false);
            d.addEventListener("pause", function() {
                e.removeClass("mejs-pause").addClass("mejs-play")
            }, false);
            d.addEventListener("paused", function() {
                e.removeClass("mejs-pause").addClass("mejs-play")
            }, false)
        }
    })
})(mejs.$);
(function(f) {
    f.extend(mejs.MepDefaults, {
        stopText: "Stop"
    });
    f.extend(MediaElementPlayer.prototype, {
        buildstop: function(a, c, b, d) {
            f('<div class="mejs-button mejs-stop-button mejs-stop"><button type="button" aria-controls="' + this.id + '" title="' + this.options.stopText + "></button></div>").appendTo(c).click(function() {
                d.paused || d.pause();
                if (d.currentTime > 0) {
                    d.setCurrentTime(0);
                    c.find(".mejs-time-current").width("0px");
                    c.find(".mejs-time-handle").css("left", "0px");
                    c.find(".mejs-time-float-current").html(mejs.Utility.secondsToTimeCode(0));
                    c.find(".mejs-currenttime").html(mejs.Utility.secondsToTimeCode(0));
                    b.find(".mejs-poster").show()
                }
            })
        }
    })
})(mejs.$);
(function(f) {
    f.extend(MediaElementPlayer.prototype, {
        buildprogress: function(a, c, b, d) {
            f('<div class="mejs-time-rail"><span class="mejs-time-total"><span class="mejs-time-loaded"></span><span class="mejs-time-current"></span><span class="mejs-time-handle"></span><span class="mejs-time-float"><span class="mejs-time-float-current">00:00</span><span class="mejs-time-float-corner"></span></span></span></div>').appendTo(c);
            var e = c.find(".mejs-time-total");
            b = c.find(".mejs-time-loaded");
            var g = c.find(".mejs-time-current"),
                k = c.find(".mejs-time-handle"),
                h = c.find(".mejs-time-float"),
                o = c.find(".mejs-time-float-current"),
                n = function(l) {
                    l = l.pageX;
                    var m = e.offset(),
                        i = e.outerWidth(),
                        j = 0;
                    j = 0;
                    var q = l - m.left;
                    if (l > m.left && l <= i + m.left && d.duration) {
                        j = (l - m.left) / i;
                        j = j <= 0.02 ? 0 : j * d.duration;
                        p && d.setCurrentTime(j);
                        if (!mejs.MediaFeatures.hasTouch) {
                            h.css("left", q);
                            o.html(mejs.Utility.secondsToTimeCode(j));
                            h.show()
                        }
                    }
                },
                p = false,
                r = false;
            e.bind("mousedown", function(l) {
                if (l.which === 1) {
                    p = true;
                    n(l);
                    return false
                }
            });
            c.find(".mejs-time-total").bind("mouseenter",
                function() {
                    r = true;
                    mejs.MediaFeatures.hasTouch || h.show()
                }).bind("mouseleave", function() {
                r = false;
                h.hide()
            });
            f(document).bind("mouseup", function() {
                p = false;
                h.hide()
            }).bind("mousemove", function(l) {
                if (p || r) n(l)
            });
            d.addEventListener("progress", function(l) {
                a.setProgressRail(l);
                a.setCurrentRail(l)
            }, false);
            d.addEventListener("timeupdate", function(l) {
                a.setProgressRail(l);
                a.setCurrentRail(l)
            }, false);
            this.loaded = b;
            this.total = e;
            this.current = g;
            this.handle = k
        },
        setProgressRail: function(a) {
            var c = a != undefined ? a.target :
                this.media,
                b = null;
            if (c && c.buffered && c.buffered.length > 0 && c.buffered.end && c.duration) b = c.buffered.end(0) / c.duration;
            else if (c && c.bytesTotal != undefined && c.bytesTotal > 0 && c.bufferedBytes != undefined) b = c.bufferedBytes / c.bytesTotal;
            else if (a && a.lengthComputable && a.total != 0) b = a.loaded / a.total;
            if (b !== null) {
                b = Math.min(1, Math.max(0, b));
                this.loaded && this.total && this.loaded.width(this.total.width() * b)
            }
        },
        setCurrentRail: function() {
            if (this.media.currentTime != undefined && this.media.duration)
                if (this.total && this.handle) {
                    var a =
                        this.total.width() * this.media.currentTime / this.media.duration,
                        c = a - this.handle.outerWidth(true) / 2;
                    this.current.width(a);
                    this.handle.css("left", c)
                }
        }
    })
})(mejs.$);
(function(f) {
    f.extend(mejs.MepDefaults, {
        duration: -1,
        timeAndDurationSeparator: " <span> | </span> "
    });
    f.extend(MediaElementPlayer.prototype, {
        buildcurrent: function(a, c, b, d) {
            f('<div class="mejs-time"><span class="mejs-currenttime">' + (a.options.alwaysShowHours ? "00:" : "") + (a.options.showTimecodeFrameCount ? "00:00:00" : "00:00") + "</span></div>").appendTo(c);
            this.currenttime = this.controls.find(".mejs-currenttime");
            d.addEventListener("timeupdate", function() {
                a.updateCurrent()
            }, false)
        },
        buildduration: function(a,
            c, b, d) {
            if (c.children().last().find(".mejs-currenttime").length > 0) f(this.options.timeAndDurationSeparator + '<span class="mejs-duration">' + (this.options.duration > 0 ? mejs.Utility.secondsToTimeCode(this.options.duration, this.options.alwaysShowHours || this.media.duration > 3600, this.options.showTimecodeFrameCount, this.options.framesPerSecond || 25) : (a.options.alwaysShowHours ? "00:" : "") + (a.options.showTimecodeFrameCount ? "00:00:00" : "00:00")) + "</span>").appendTo(c.find(".mejs-time"));
            else {
                c.find(".mejs-currenttime").parent().addClass("mejs-currenttime-container");
                f('<div class="mejs-time mejs-duration-container"><span class="mejs-duration">' + (this.options.duration > 0 ? mejs.Utility.secondsToTimeCode(this.options.duration, this.options.alwaysShowHours || this.media.duration > 3600, this.options.showTimecodeFrameCount, this.options.framesPerSecond || 25) : (a.options.alwaysShowHours ? "00:" : "") + (a.options.showTimecodeFrameCount ? "00:00:00" : "00:00")) + "</span></div>").appendTo(c)
            }
            this.durationD = this.controls.find(".mejs-duration");
            d.addEventListener("timeupdate", function() {
                    a.updateDuration()
                },
                false)
        },
        updateCurrent: function() {
            if (this.currenttime) this.currenttime.html(mejs.Utility.secondsToTimeCode(this.media.currentTime, this.options.alwaysShowHours || this.media.duration > 3600, this.options.showTimecodeFrameCount, this.options.framesPerSecond || 25))
        },
        updateDuration: function() {
            if (this.media.duration && this.durationD) this.durationD.html(mejs.Utility.secondsToTimeCode(this.media.duration, this.options.alwaysShowHours, this.options.showTimecodeFrameCount, this.options.framesPerSecond || 25))
        }
    })
})(mejs.$);
(function(f) {
    f.extend(mejs.MepDefaults, {
        muteText: "Mute Toggle",
        hideVolumeOnTouchDevices: true,
        audioVolume: "horizontal",
        videoVolume: "vertical"
    });
    f.extend(MediaElementPlayer.prototype, {
        buildvolume: function(a, c, b, d) {
            if (!(mejs.MediaFeatures.hasTouch && this.options.hideVolumeOnTouchDevices)) {
                var e = this.isVideo ? this.options.videoVolume : this.options.audioVolume,
                    g = e == "horizontal" ? f('<div class="mejs-button mejs-volume-button mejs-mute"><button type="button" aria-controls="' + this.id + '" title="' + this.options.muteText +
                        '"></button></div><div class="mejs-horizontal-volume-slider"><div class="mejs-horizontal-volume-total"></div><div class="mejs-horizontal-volume-current"></div><div class="mejs-horizontal-volume-handle"></div></div>').appendTo(c) : f('<div class="mejs-button mejs-volume-button mejs-mute"><button type="button" aria-controls="' + this.id + '" title="' + this.options.muteText + '"></button><div class="mejs-volume-slider"><div class="mejs-volume-total"></div><div class="mejs-volume-current"></div><div class="mejs-volume-handle"></div></div></div>').appendTo(c),
                    k = this.container.find(".mejs-volume-slider, .mejs-horizontal-volume-slider"),
                    h = this.container.find(".mejs-volume-total, .mejs-horizontal-volume-total"),
                    o = this.container.find(".mejs-volume-current, .mejs-horizontal-volume-current"),
                    n = this.container.find(".mejs-volume-handle, .mejs-horizontal-volume-handle"),
                    p = function(i) {
                        if (k.is(":visible")) {
                            i = Math.max(0, i);
                            i = Math.min(i, 1);
                            i == 0 ? g.removeClass("mejs-mute").addClass("mejs-unmute") : g.removeClass("mejs-unmute").addClass("mejs-mute");
                            if (e == "vertical") {
                                var j =
                                    h.height(),
                                    q = h.position();
                                i = j - j * i;
                                n.css("top", q.top + i - n.height() / 2);
                                o.height(j - i);
                                o.css("top", q.top + i)
                            } else {
                                j = h.width();
                                q = h.position();
                                i = j * i;
                                n.css("left", q.left + i - n.width() / 2);
                                o.width(i)
                            }
                        } else {
                            k.show();
                            p(i);
                            k.hide()
                        }
                    },
                    r = function(i) {
                        var j = null,
                            q = h.offset();
                        if (e == "vertical") {
                            j = h.height();
                            parseInt(h.css("top").replace(/px/, ""), 10);
                            j = (j - (i.pageY - q.top)) / j;
                            if (q.top == 0 || q.left == 0) return
                        } else {
                            j = h.width();
                            j = (i.pageX - q.left) / j
                        }
                        j = Math.max(0, j);
                        j = Math.min(j, 1);
                        p(j);
                        j == 0 ? d.setMuted(true) : d.setMuted(false);
                        d.setVolume(j)
                    },
                    l = false,
                    m = false;
                g.hover(function() {
                    k.show();
                    m = true
                }, function() {
                    m = false;
                    !l && e == "vertical" && k.hide()
                });
                k.bind("mouseover", function() {
                    m = true
                }).bind("mousedown", function(i) {
                    r(i);
                    l = true;
                    return false
                });
                f(document).bind("mouseup", function() {
                    l = false;
                    !m && e == "vertical" && k.hide()
                }).bind("mousemove", function(i) {
                    l && r(i)
                });
                g.find("button").click(function() {
                    d.setMuted(!d.muted)
                });
                d.addEventListener("volumechange", function() {
                    if (!l)
                        if (d.muted) {
                            p(0);
                            g.removeClass("mejs-mute").addClass("mejs-unmute")
                        } else {
                            p(d.volume);
                            g.removeClass("mejs-unmute").addClass("mejs-mute")
                        }
                }, false);
                if (this.container.is(":visible")) {
                    p(a.options.startVolume);
                    d.pluginType === "native" && d.setVolume(a.options.startVolume)
                }
            }
        }
    })
})(mejs.$);
(function(f) {
    f.extend(mejs.MepDefaults, {
        usePluginFullScreen: true,
        newWindowCallback: function() {
            return ""
        },
        fullscreenText: "Fullscreen"
    });
    f.extend(MediaElementPlayer.prototype, {
        isFullScreen: false,
        isNativeFullScreen: false,
        docStyleOverflow: null,
        isInIframe: false,
        buildfullscreen: function(a, c, b, d) {
            if (a.isVideo) {
                a.isInIframe = window.location != window.parent.location;
                mejs.MediaFeatures.hasTrueNativeFullScreen && a.container.bind(mejs.MediaFeatures.fullScreenEventName, function() {
                    if (mejs.MediaFeatures.isFullScreen()) {
                        a.isNativeFullScreen =
                            true;
                        a.setControlsSize()
                    } else {
                        a.isNativeFullScreen = false;
                        a.exitFullScreen()
                    }
                });
                var e = this,
                    g = f('<div class="mejs-button mejs-fullscreen-button"><button type="button" aria-controls="' + e.id + '" title="' + e.options.fullscreenText + '"></button></div>').appendTo(c);
                if (e.media.pluginType === "native" || !e.options.usePluginFullScreen && !mejs.MediaFeatures.isFirefox) g.click(function() {
                    mejs.MediaFeatures.hasTrueNativeFullScreen && mejs.MediaFeatures.isFullScreen() || a.isFullScreen ? a.exitFullScreen() : a.enterFullScreen()
                });
                else {
                    var k = null;
                    if (document.documentElement.style.pointerEvents === "" && !mejs.MediaFeatures.isOpera) {
                        var h = false,
                            o = function() {
                                if (h) {
                                    n.hide();
                                    p.hide();
                                    r.hide();
                                    g.css("pointer-events", "");
                                    e.controls.css("pointer-events", "");
                                    h = false
                                }
                            },
                            n = f('<div class="mejs-fullscreen-hover" />').appendTo(e.container).mouseover(o),
                            p = f('<div class="mejs-fullscreen-hover"  />').appendTo(e.container).mouseover(o),
                            r = f('<div class="mejs-fullscreen-hover"  />').appendTo(e.container).mouseover(o),
                            l = function() {
                                var m = {
                                    position: "absolute",
                                    top: 0,
                                    left: 0
                                };
                                n.css(m);
                                p.css(m);
                                r.css(m);
                                n.width(e.container.width()).height(e.container.height() - e.controls.height());
                                m = g.offset().left - e.container.offset().left;
                                fullScreenBtnWidth = g.outerWidth(true);
                                p.width(m).height(e.controls.height()).css({
                                    top: e.container.height() - e.controls.height()
                                });
                                r.width(e.container.width() - m - fullScreenBtnWidth).height(e.controls.height()).css({
                                    top: e.container.height() - e.controls.height(),
                                    left: m + fullScreenBtnWidth
                                })
                            };
                        f(document).resize(function() {
                            l()
                        });
                        g.mouseover(function() {
                            if (!e.isFullScreen) {
                                var m =
                                    g.offset(),
                                    i = a.container.offset();
                                d.positionFullscreenButton(m.left - i.left, m.top - i.top, false);
                                g.css("pointer-events", "none");
                                e.controls.css("pointer-events", "none");
                                n.show();
                                r.show();
                                p.show();
                                l();
                                h = true
                            }
                        });
                        d.addEventListener("fullscreenchange", function() {
                            o()
                        })
                    } else g.mouseover(function() {
                        if (k !== null) {
                            clearTimeout(k);
                            delete k
                        }
                        var m = g.offset(),
                            i = a.container.offset();
                        d.positionFullscreenButton(m.left - i.left, m.top - i.top, true)
                    }).mouseout(function() {
                        if (k !== null) {
                            clearTimeout(k);
                            delete k
                        }
                        k = setTimeout(function() {
                                d.hideFullscreenButton()
                            },
                            1500)
                    })
                }
                a.fullscreenBtn = g;
                f(document).bind("keydown", function(m) {
                    if ((mejs.MediaFeatures.hasTrueNativeFullScreen && mejs.MediaFeatures.isFullScreen() || e.isFullScreen) && m.keyCode == 27) a.exitFullScreen()
                })
            }
        },
        enterFullScreen: function() {
            var a = this;
            if (!(a.media.pluginType !== "native" && (mejs.MediaFeatures.isFirefox || a.options.usePluginFullScreen))) {
                docStyleOverflow = document.documentElement.style.overflow;
                document.documentElement.style.overflow = "hidden";
                normalHeight = a.container.height();
                normalWidth = a.container.width();
                if (a.media.pluginType === "native")
                    if (mejs.MediaFeatures.hasTrueNativeFullScreen) {
                        mejs.MediaFeatures.requestFullScreen(a.container[0]);
                        a.isInIframe && setTimeout(function b() {
                            if (a.isNativeFullScreen) f(window).width() !== screen.width ? a.exitFullScreen() : setTimeout(b, 500)
                        }, 500)
                    } else if (mejs.MediaFeatures.hasSemiNativeFullScreen) {
                    a.media.webkitEnterFullscreen();
                    return
                }
                if (a.isInIframe) {
                    var c = a.options.newWindowCallback(this);
                    if (c !== "")
                        if (mejs.MediaFeatures.hasTrueNativeFullScreen) setTimeout(function() {
                            if (!a.isNativeFullScreen) {
                                a.pause();
                                window.open(c, a.id, "top=0,left=0,width=" + screen.availWidth + ",height=" + screen.availHeight + ",resizable=yes,scrollbars=no,status=no,toolbar=no")
                            }
                        }, 250);
                        else {
                            a.pause();
                            window.open(c, a.id, "top=0,left=0,width=" + screen.availWidth + ",height=" + screen.availHeight + ",resizable=yes,scrollbars=no,status=no,toolbar=no");
                            return
                        }
                }
                a.container.addClass("mejs-container-fullscreen").width("100%").height("100%");
                setTimeout(function() {
                    a.container.css({
                        width: "100%",
                        height: "100%"
                    });
                    a.setControlsSize()
                }, 500);
                if (a.pluginType ===
                    "native") a.$media.width("100%").height("100%");
                else {
                    a.container.find("object, embed, iframe").width("100%").height("100%");
                    a.media.setVideoSize(f(window).width(), f(window).height())
                }
                a.layers.children("div").width("100%").height("100%");
                a.fullscreenBtn && a.fullscreenBtn.removeClass("mejs-fullscreen").addClass("mejs-unfullscreen");
                a.setControlsSize();
                a.isFullScreen = true
            }
        },
        exitFullScreen: function() {
            if (this.media.pluginType !== "native" && mejs.MediaFeatures.isFirefox) this.media.setFullscreen(false);
            else {
                if (mejs.MediaFeatures.hasTrueNativeFullScreen &&
                    (mejs.MediaFeatures.isFullScreen() || this.isFullScreen)) mejs.MediaFeatures.cancelFullScreen();
                document.documentElement.style.overflow = docStyleOverflow;
                this.container.removeClass("mejs-container-fullscreen").width(normalWidth).height(normalHeight);
                if (this.pluginType === "native") this.$media.width(normalWidth).height(normalHeight);
                else {
                    this.container.find("object embed").width(normalWidth).height(normalHeight);
                    this.media.setVideoSize(normalWidth, normalHeight)
                }
                this.layers.children("div").width(normalWidth).height(normalHeight);
                this.fullscreenBtn.removeClass("mejs-unfullscreen").addClass("mejs-fullscreen");
                this.setControlsSize();
                this.isFullScreen = false
            }
        }
    })
})(mejs.$);
(function(f) {
    f.extend(mejs.MepDefaults, {
        startLanguage: "",
        tracksText: "Captions/Subtitles"
    });
    f.extend(MediaElementPlayer.prototype, {
        hasChapters: false,
        buildtracks: function(a, c, b, d) {
            if (a.isVideo)
                if (a.tracks.length != 0) {
                    var e;
                    a.chapters = f('<div class="mejs-chapters mejs-layer"></div>').prependTo(b).hide();
                    a.captions = f('<div class="mejs-captions-layer mejs-layer"><div class="mejs-captions-position"><span class="mejs-captions-text"></span></div></div>').prependTo(b).hide();
                    a.captionsText = a.captions.find(".mejs-captions-text");
                    a.captionsButton = f('<div class="mejs-button mejs-captions-button"><button type="button" aria-controls="' + this.id + '" title="' + this.options.tracksText + '"></button><div class="mejs-captions-selector"><ul><li><input type="radio" name="' + a.id + '_captions" id="' + a.id + '_captions_none" value="none" checked="checked" /><label for="' + a.id + '_captions_none">None</label></li></ul></div></div>').appendTo(c).hover(function() {
                        f(this).find(".mejs-captions-selector").css("visibility", "visible")
                    }, function() {
                        f(this).find(".mejs-captions-selector").css("visibility",
                            "hidden")
                    }).delegate("input[type=radio]", "click", function() {
                        lang = this.value;
                        if (lang == "none") a.selectedTrack = null;
                        else
                            for (e = 0; e < a.tracks.length; e++)
                                if (a.tracks[e].srclang == lang) {
                                    a.selectedTrack = a.tracks[e];
                                    a.captions.attr("lang", a.selectedTrack.srclang);
                                    a.displayCaptions();
                                    break
                                }
                    });
                    a.options.alwaysShowControls ? a.container.find(".mejs-captions-position").addClass("mejs-captions-position-hover") : a.container.bind("mouseenter", function() {
                        a.container.find(".mejs-captions-position").addClass("mejs-captions-position-hover")
                    }).bind("mouseleave",
                        function() {
                            d.paused || a.container.find(".mejs-captions-position").removeClass("mejs-captions-position-hover")
                        });
                    a.trackToLoad = -1;
                    a.selectedTrack = null;
                    a.isLoadingTrack = false;
                    for (e = 0; e < a.tracks.length; e++) a.tracks[e].kind == "subtitles" && a.addTrackButton(a.tracks[e].srclang, a.tracks[e].label);
                    a.loadNextTrack();
                    d.addEventListener("timeupdate", function() {
                        a.displayCaptions()
                    }, false);
                    d.addEventListener("loadedmetadata", function() {
                        a.displayChapters()
                    }, false);
                    a.container.hover(function() {
                        if (a.hasChapters) {
                            a.chapters.css("visibility",
                                "visible");
                            a.chapters.fadeIn(200)
                        }
                    }, function() {
                        a.hasChapters && !d.paused && a.chapters.fadeOut(200, function() {
                            f(this).css("visibility", "hidden");
                            f(this).css("display", "block")
                        })
                    });
                    a.node.getAttribute("autoplay") !== null && a.chapters.css("visibility", "hidden")
                }
        },
        loadNextTrack: function() {
            this.trackToLoad++;
            if (this.trackToLoad < this.tracks.length) {
                this.isLoadingTrack = true;
                this.loadTrack(this.trackToLoad)
            } else this.isLoadingTrack = false
        },
        loadTrack: function(a) {
            var c = this,
                b = c.tracks[a],
                d = function() {
                    b.isLoaded =
                        true;
                    c.enableTrackButton(b.srclang, b.label);
                    c.loadNextTrack()
                };
            b.isTranslation ? mejs.TrackFormatParser.translateTrackText(c.tracks[0].entries, c.tracks[0].srclang, b.srclang, c.options.googleApiKey, function(e) {
                b.entries = e;
                d()
            }) : f.ajax({
                url: b.src,
                success: function(e) {
                    b.entries = mejs.TrackFormatParser.parse(e);
                    d();
                    b.kind == "chapters" && c.media.duration > 0 && c.drawChapters(b)
                },
                error: function() {
                    c.loadNextTrack()
                }
            })
        },
        enableTrackButton: function(a, c) {
            if (c === "") c = mejs.language.codes[a] || a;
            this.captionsButton.find("input[value=" +
                a + "]").prop("disabled", false).siblings("label").html(c);
            this.options.startLanguage == a && f("#" + this.id + "_captions_" + a).click();
            this.adjustLanguageBox()
        },
        addTrackButton: function(a, c) {
            if (c === "") c = mejs.language.codes[a] || a;
            this.captionsButton.find("ul").append(f('<li><input type="radio" name="' + this.id + '_captions" id="' + this.id + "_captions_" + a + '" value="' + a + '" disabled="disabled" /><label for="' + this.id + "_captions_" + a + '">' + c + " (loading)</label></li>"));
            this.adjustLanguageBox();
            this.container.find(".mejs-captions-translations option[value=" +
                a + "]").remove()
        },
        adjustLanguageBox: function() {
            this.captionsButton.find(".mejs-captions-selector").height(this.captionsButton.find(".mejs-captions-selector ul").outerHeight(true) + this.captionsButton.find(".mejs-captions-translations").outerHeight(true))
        },
        displayCaptions: function() {
            if (typeof this.tracks != "undefined") {
                var a, c = this.selectedTrack;
                if (c != null && c.isLoaded)
                    for (a = 0; a < c.entries.times.length; a++)
                        if (this.media.currentTime >= c.entries.times[a].start && this.media.currentTime <= c.entries.times[a].stop) {
                            this.captionsText.html(c.entries.text[a]);
                            this.captions.show();
                            return
                        }
                this.captions.hide()
            }
        },
        displayChapters: function() {
            var a;
            for (a = 0; a < this.tracks.length; a++)
                if (this.tracks[a].kind == "chapters" && this.tracks[a].isLoaded) {
                    this.drawChapters(this.tracks[a]);
                    this.hasChapters = true;
                    break
                }
        },
        drawChapters: function(a) {
            var c = this,
                b, d, e = d = 0;
            c.chapters.empty();
            for (b = 0; b < a.entries.times.length; b++) {
                d = a.entries.times[b].stop - a.entries.times[b].start;
                d = Math.floor(d / c.media.duration * 100);
                if (d + e > 100 || b == a.entries.times.length - 1 && d + e < 100) d = 100 - e;
                c.chapters.append(f('<div class="mejs-chapter" rel="' +
                    a.entries.times[b].start + '" style="left: ' + e.toString() + "%;width: " + d.toString() + '%;"><div class="mejs-chapter-block' + (b == a.entries.times.length - 1 ? " mejs-chapter-block-last" : "") + '"><span class="ch-title">' + a.entries.text[b] + '</span><span class="ch-time">' + mejs.Utility.secondsToTimeCode(a.entries.times[b].start) + "&ndash;" + mejs.Utility.secondsToTimeCode(a.entries.times[b].stop) + "</span></div></div>"));
                e += d
            }
            c.chapters.find("div.mejs-chapter").click(function() {
                c.media.setCurrentTime(parseFloat(f(this).attr("rel")));
                c.media.paused && c.media.play()
            });
            c.chapters.show()
        }
    });
    mejs.language = {
        codes: {
            af: "Afrikaans",
            sq: "Albanian",
            ar: "Arabic",
            be: "Belarusian",
            bg: "Bulgarian",
            ca: "Catalan",
            zh: "Chinese",
            "zh-cn": "Chinese Simplified",
            "zh-tw": "Chinese Traditional",
            hr: "Croatian",
            cs: "Czech",
            da: "Danish",
            nl: "Dutch",
            en: "English",
            et: "Estonian",
            tl: "Filipino",
            fi: "Finnish",
            fr: "French",
            gl: "Galician",
            de: "German",
            el: "Greek",
            ht: "Haitian Creole",
            iw: "Hebrew",
            hi: "Hindi",
            hu: "Hungarian",
            is: "Icelandic",
            id: "Indonesian",
            ga: "Irish",
            it: "Italian",
            ja: "Japanese",
            ko: "Korean",
            lv: "Latvian",
            lt: "Lithuanian",
            mk: "Macedonian",
            ms: "Malay",
            mt: "Maltese",
            no: "Norwegian",
            fa: "Persian",
            pl: "Polish",
            pt: "Portuguese",
            ro: "Romanian",
            ru: "Russian",
            sr: "Serbian",
            sk: "Slovak",
            sl: "Slovenian",
            es: "Spanish",
            sw: "Swahili",
            sv: "Swedish",
            tl: "Tagalog",
            th: "Thai",
            tr: "Turkish",
            uk: "Ukrainian",
            vi: "Vietnamese",
            cy: "Welsh",
            yi: "Yiddish"
        }
    };
    mejs.TrackFormatParser = {
        pattern_identifier: /^([a-zA-z]+-)?[0-9]+$/,
        pattern_timecode: /^([0-9]{2}:[0-9]{2}:[0-9]{2}([,.][0-9]{1,3})?) --\> ([0-9]{2}:[0-9]{2}:[0-9]{2}([,.][0-9]{3})?)(.*)$/,
        split2: function(a, c) {
            return a.split(c)
        },
        parse: function(a) {
            var c = 0;
            a = this.split2(a, /\r?\n/);
            for (var b = {
                    text: [],
                    times: []
                }, d, e; c < a.length; c++)
                if (this.pattern_identifier.exec(a[c])) {
                    c++;
                    if ((d = this.pattern_timecode.exec(a[c])) && c < a.length) {
                        c++;
                        e = a[c];
                        for (c++; a[c] !== "" && c < a.length;) {
                            e = e + "\n" + a[c];
                            c++
                        }
                        b.text.push(e);
                        b.times.push({
                            start: mejs.Utility.timeCodeToSeconds(d[1]),
                            stop: mejs.Utility.timeCodeToSeconds(d[3]),
                            settings: d[5]
                        })
                    }
                }
            return b
        }
    };
    if ("x\n\ny".split(/\n/gi).length != 3) mejs.TrackFormatParser.split2 =
        function(a, c) {
            var b = [],
                d = "",
                e;
            for (e = 0; e < a.length; e++) {
                d += a.substring(e, e + 1);
                if (c.test(d)) {
                    b.push(d.replace(c, ""));
                    d = ""
                }
            }
            b.push(d);
            return b
        }
})(mejs.$);
(function(f) {
    f.extend(mejs.MepDefaults, contextMenuItems = [{
        render: function(a) {


            if (typeof a.enterFullScreen == "undefined") return null;
            return a.isFullScreen ? "Turn off Fullscreen" : "Go Fullscreen"
        },
        click: function(a) {
            a.isFullScreen ? a.exitFullScreen() : a.enterFullScreen()
        }
    }, {
        render: function(a) {
            return a.media.muted ? "Unmute" : "Mute"
        },
        click: function(a) {
            a.media.muted ? a.setMuted(false) : a.setMuted(true)
        }
    }, {
        isSeparator: true
    }, {
        render: function() {
            return "Download Video"
        },
        click: function(a) {
            window.location.href = a.media.currentSrc
        }
    }]);
    f.extend(MediaElementPlayer.prototype, {
        buildcontextmenu: function(a) {
            a.contextMenu = f('<div class="mejs-contextmenu"></div>').appendTo(f("body")).hide();
            a.container.bind("contextmenu", function(c) {
                if (a.isContextMenuEnabled) {
                    c.preventDefault();
                    a.renderContextMenu(c.clientX - 1, c.clientY - 1);
                    return false
                }
            });
            a.container.bind("click", function() {
                a.contextMenu.hide()
            });
            a.contextMenu.bind("mouseleave", function() {
                a.startContextMenuTimer()
            })
        },
        isContextMenuEnabled: true,
        enableContextMenu: function() {
            this.isContextMenuEnabled =
                true
        },
        disableContextMenu: function() {
            this.isContextMenuEnabled = false
        },
        contextMenuTimeout: null,
        startContextMenuTimer: function() {
            var a = this;
            a.killContextMenuTimer();
            a.contextMenuTimer = setTimeout(function() {
                a.hideContextMenu();
                a.killContextMenuTimer()
            }, 750)
        },
        killContextMenuTimer: function() {
            var a = this.contextMenuTimer;
            if (a != null) {
                clearTimeout(a);
                delete a
            }
        },
        hideContextMenu: function() {
            this.contextMenu.hide()
        },
        renderContextMenu: function(a, c) {
            for (var b = this, d = "", e = b.options.contextMenuItems, g = 0, k = e.length; g <
                k; g++)
                if (e[g].isSeparator) d += '<div class="mejs-contextmenu-separator"></div>';
                else {
                    var h = e[g].render(b);
                    if (h != null) d += '<div class="mejs-contextmenu-item" data-itemindex="' + g + '" id="element-' + Math.random() * 1E6 + '">' + h + "</div>"
                }
            b.contextMenu.empty().append(f(d)).css({
                top: c,
                left: a
            }).show();
            b.contextMenu.find(".mejs-contextmenu-item").each(function() {
                var o = f(this),
                    n = parseInt(o.data("itemindex"), 10),
                    p = b.options.contextMenuItems[n];
                typeof p.show != "undefined" && p.show(o, b);
                o.click(function() {
                    typeof p.click !=
                        "undefined" && p.click(b);
                    b.contextMenu.hide()
                })
            });
            setTimeout(function() {
                b.killControlsTimer("rev3")
            }, 100)
        }
    })
})(mejs.$);

		$(document).ready(function() {
			$('#audio-player').mediaelementplayer({
				alwaysShowControls: true,
				features: ['playpause','volume','progress'],
				audioVolume: 'horizontal',
				audioWidth: 400,
				audioHeight: 120
			});
		});