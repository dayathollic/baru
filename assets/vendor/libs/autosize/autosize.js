! function(e, t) {
    if ("object" == typeof exports && "object" == typeof module) module.exports = t();
    else if ("function" == typeof define && define.amd) define([], t);
    else {
        var n = t();
        for (var o in n)("object" == typeof exports ? exports : e)[o] = n[o]
    }
}(self, (function() {
    return function() {
        var e = {
                9367: function(e) {
                    e.exports = function() {
                        var e, t, n = "function" == typeof Map ? new Map : (e = [], t = [], {
                                has: function(t) {
                                    return e.indexOf(t) > -1
                                },
                                get: function(n) {
                                    return t[e.indexOf(n)]
                                },
                                set: function(n, o) {
                                    -1 === e.indexOf(n) && (e.push(n), t.push(o))
                                },
                                delete: function(n) {
                                    var o = e.indexOf(n);
                                    o > -1 && (e.splice(o, 1), t.splice(o, 1))
                                }
                            }),
                            o = function(e) {
                                return new Event(e, {
                                    bubbles: !0
                                })
                            };
                        try {
                            new Event("test")
                        } catch (e) {
                            o = function(e) {
                                var t = document.createEvent("Event");
                                return t.initEvent(e, !0, !1), t
                            }
                        }

                        function r(e) {
                            if (e && e.nodeName && "TEXTAREA" === e.nodeName && !n.has(e)) {
                                var t = null,
                                    r = null,
                                    i = null,
                                    u = function() {
                                        e.clientWidth !== r && f()
                                    },
                                    a = function(t) {
                                        window.removeEventListener("resize", u, !1), e.removeEventListener("input", f, !1), e.removeEventListener("keyup", f, !1), e.removeEventListener("autosize:destroy", a, !1), e.removeEventListener("autosize:update", f, !1), Object.keys(t).forEach((function(n) {
                                            e.style[n] = t[n]
                                        })), n.delete(e)
                                    }.bind(e, {
                                        height: e.style.height,
                                        resize: e.style.resize,
                                        overflowY: e.style.overflowY,
                                        overflowX: e.style.overflowX,
                                        wordWrap: e.style.wordWrap
                                    });
                                e.addEventListener("autosize:destroy", a, !1), "onpropertychange" in e && "oninput" in e && e.addEventListener("keyup", f, !1), window.addEventListener("resize", u, !1), e.addEventListener("input", f, !1), e.addEventListener("autosize:update", f, !1), e.style.overflowX = "hidden", e.style.wordWrap = "break-word", n.set(e, {
                                    destroy: a,
                                    update: f
                                }), "vertical" === (l = window.getComputedStyle(e, null)).resize ? e.style.resize = "none" : "both" === l.resize && (e.style.resize = "horizontal"), t = "content-box" === l.boxSizing ? -(parseFloat(l.paddingTop) + parseFloat(l.paddingBottom)) : parseFloat(l.borderTopWidth) + parseFloat(l.borderBottomWidth), isNaN(t) && (t = 0), f()
                            }
                            var l;

                            function d(t) {
                                var n = e.style.width;
                                e.style.width = "0px", e.style.width = n, e.style.overflowY = t
                            }

                            function s() {
                                if (0 !== e.scrollHeight) {
                                    var n = function(e) {
                                        for (var t = []; e && e.parentNode && e.parentNode instanceof Element;) e.parentNode.scrollTop && (e.parentNode.style.scrollBehavior = "auto", t.push([e.parentNode, e.parentNode.scrollTop])), e = e.parentNode;
                                        return function() {
                                            return t.forEach((function(e) {
                                                var t = e[0],
                                                    n = e[1];
                                                t.scrollTop = n, t.style.scrollBehavior = null
                                            }))
                                        }
                                    }(e);
                                    e.style.height = "", e.style.height = e.scrollHeight + t + "px", r = e.clientWidth, n()
                                }
                            }

                            function f() {
                                s();
                                var t = Math.round(parseFloat(e.style.height)),
                                    n = window.getComputedStyle(e, null),
                                    r = "content-box" === n.boxSizing ? Math.round(parseFloat(n.height)) : e.offsetHeight;
                                if (r < t ? "hidden" === n.overflowY && (d("scroll"), s(), r = "content-box" === n.boxSizing ? Math.round(parseFloat(window.getComputedStyle(e, null).height)) : e.offsetHeight) : "hidden" !== n.overflowY && (d("hidden"), s(), r = "content-box" === n.boxSizing ? Math.round(parseFloat(window.getComputedStyle(e, null).height)) : e.offsetHeight), i !== r) {
                                    i = r;
                                    var u = o("autosize:resized");
                                    try {
                                        e.dispatchEvent(u)
                                    } catch (e) {}
                                }
                            }
                        }

                        function i(e) {
                            var t = n.get(e);
                            t && t.destroy()
                        }

                        function u(e) {
                            var t = n.get(e);
                            t && t.update()
                        }
                        var a = null;
                        return "undefined" == typeof window || "function" != typeof window.getComputedStyle ? ((a = function(e) {
                            return e
                        }).destroy = function(e) {
                            return e
                        }, a.update = function(e) {
                            return e
                        }) : ((a = function(e, t) {
                            return e && Array.prototype.forEach.call(e.length ? e : [e], (function(e) {
                                return r(e)
                            })), e
                        }).destroy = function(e) {
                            return e && Array.prototype.forEach.call(e.length ? e : [e], i), e
                        }, a.update = function(e) {
                            return e && Array.prototype.forEach.call(e.length ? e : [e], u), e
                        }), a
                    }()
                }
            },
            t = {};

        function n(o) {
            var r = t[o];
            if (void 0 !== r) return r.exports;
            var i = t[o] = {
                exports: {}
            };
            return e[o].call(i.exports, i, i.exports, n), i.exports
        }
        n.n = function(e) {
            var t = e && e.__esModule ? function() {
                return e.default
            } : function() {
                return e
            };
            return n.d(t, {
                a: t
            }), t
        }, n.d = function(e, t) {
            for (var o in t) n.o(t, o) && !n.o(e, o) && Object.defineProperty(e, o, {
                enumerable: !0,
                get: t[o]
            })
        }, n.o = function(e, t) {
            return Object.prototype.hasOwnProperty.call(e, t)
        }, n.r = function(e) {
            "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
                value: "Module"
            }), Object.defineProperty(e, "__esModule", {
                value: !0
            })
        };
        var o = {};
        return function() {
            "use strict";
            n.r(o), n.d(o, {
                autosize: function() {
                    return e
                }
            });
            var e = n(9367)
        }(), o
    }()
}));