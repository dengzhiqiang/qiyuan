/* $Id : utils.js 5052 2007-02-03 10:30:13Z weberliu $ */

var Browser = new Object();

Browser.isMozilla = (typeof document.implementation != 'undefined') && (typeof document.implementation.createDocument != 'undefined') && (typeof HTMLDocument != 'undefined');
Browser.isIE = window.ActiveXObject ? true : false;
Browser.isFirefox = (navigator.userAgent.toLowerCase().indexOf("firefox") != -1);
Browser.isSafari = (navigator.userAgent.toLowerCase().indexOf("safari") != -1);
Browser.isOpera = (navigator.userAgent.toLowerCase().indexOf("opera") != -1);

var Utils = new Object();
/*验证用户名*/
Utils.usernameCheckMore = function (text) {
    var sIdCard = text.replace(/^\s+|\s+$/g, "");//去除字符串的前后空格，允许用户不小心输入前后空格
    if (sIdCard.match(/[^a-zA-Z0-9\u4E00-\u9FA5@\.]/g) == null) {
        // 如果不是合法的字符串就会匹配到，匹配到就会为真 == null 表示匹配不到，说明就是合法
        return false;
    } else {
        // 返回true代表非法
        return true;
    }
}
/*判断用户名是否为身份证号码*/
Utils.usernameIsCardID = function (text) {
    var CheckIdCard = {
        //Wi 加权因子 Xi 余数0~10对应的校验码 Pi省份代码
        Wi: [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2],
        Xi: [1, 0, "X", 9, 8, 7, 6, 5, 4, 3, 2],
        Pi: [11, 12, 13, 14, 15, 21, 22, 23, 31, 32, 33, 34, 35, 36, 37, 41, 42, 43, 44, 45, 46, 50, 51, 52, 53, 54, 61, 62, 63, 64, 65, 71, 81, 82, 91],

        //检验18位身份证号码出生日期是否有效
        //parseFloat过滤前导零，年份必需大于等于1900且小于等于当前年份，用Date()对象判断日期是否有效。
        brithday18: function (sIdCard) {
            var year = parseFloat(sIdCard.substr(6, 4));
            var month = parseFloat(sIdCard.substr(10, 2));
            var day = parseFloat(sIdCard.substr(12, 2));
            var checkDay = new Date(year, month - 1, day);
            var nowDay = new Date();
            if (1900 <= year && year <= nowDay.getFullYear() && month == (checkDay.getMonth() + 1) && day == checkDay.getDate()) {
                return true;
            }
            ;
        },

        //检验15位身份证号码出生日期是否有效
        brithday15: function (sIdCard) {
            var year = parseFloat(sIdCard.substr(6, 2));
            var month = parseFloat(sIdCard.substr(8, 2));
            var day = parseFloat(sIdCard.substr(10, 2));
            var checkDay = new Date(year, month - 1, day);
            if (month == (checkDay.getMonth() + 1) && day == checkDay.getDate()) {
                return true;
            }
            ;
        },

        //检验校验码是否有效
        validate: function (sIdCard) {
            var aIdCard = sIdCard.split("");
            var sum = 0;
            for (var i = 0; i < CheckIdCard.Wi.length; i++) {
                sum += CheckIdCard.Wi[i] * aIdCard[i]; //线性加权求和
            }
            ;
            var index = sum % 11;//求模，可能为0~10,可求对应的校验码是否于身份证的校验码匹配
            if (CheckIdCard.Xi[index] == aIdCard[17].toUpperCase()) {
                return true;
            }
            ;
        },

        //检验输入的省份编码是否有效
        province: function (sIdCard) {
            var p2 = sIdCard.substr(0, 2);
            for (var i = 0; i < CheckIdCard.Pi.length; i++) {
                if (CheckIdCard.Pi[i] == p2) {
                    return true;
                }
                ;
            }
            ;
        }
    };

    var sIdCard = text.replace(/^\s+|\s+$/g, "");//去除字符串的前后空格，允许用户不小心输入前后空格
    if (sIdCard.match(/^\d{14,17}(\d|X)$/gi) == null) {//判断是否全为18或15位数字，最后一位可以是大小写字母X
        // alert("身份证号码须为18位或15位数字");      //允许用户输入大小写X代替罗马数字的Ⅹ
        return false;
    }
    else if (sIdCard.length == 18) {
        if (CheckIdCard.province(sIdCard) && CheckIdCard.brithday18(sIdCard) && CheckIdCard.validate(sIdCard)) {
            // alert("身份证号码合法");
            return true;
        }
        else {
            // alert("请输入有效的身份证号码");
            return false;
        }
    }
    else if (sIdCard.length == 15) {
        if (CheckIdCard.province(sIdCard) && CheckIdCard.brithday15(sIdCard)) {
            // alert("身份证号码合法");
            return true;
        }
        else {
            // alert("请输入有效的身份证号码");
            return false;
        }
    }
    else {
        return false;
    }
};
/*// 判断用户名是否为身份证号码*/


Utils.htmlEncode = function (text) {
    return text.replace(/&/g, '&amp;').replace(/"/g, '&quot;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
}

Utils.trim = function (text) {
    if (typeof(text) == "string") {
        return text.replace(/^\s*|\s*$/g, "");
    }
    else {
        return text;
    }
}

Utils.isEmpty = function (val) {
    switch (typeof(val)) {
        case 'string':
            return Utils.trim(val).length == 0 ? true : false;
            break;
        case 'number':
            return val == 0;
            break;
        case 'object':
            return val == null;
            break;
        case 'array':
            return val.length == 0;
            break;
        default:
            return true;
    }
}

Utils.isNumber = function (val) {
    var reg = /^[\d|\.|,]+$/;
    return reg.test(val);
}

Utils.isInt = function (val) {
    if (val == "") {
        return false;
    }
    var reg = /\D+/;
    return !reg.test(val);
}

Utils.isEmail = function (email) {
    var reg1 = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)/;

    return reg1.test(email);
}

Utils.isTel = function (tel) {
    var reg = /^[\d|\-|\s|\_]+$/; //只允许使用数字-空格等

    return reg.test(tel);
}

Utils.fixEvent = function (e) {
    var evt = (typeof e == "undefined") ? window.event : e;
    return evt;
}

Utils.srcElement = function (e) {
    if (typeof e == "undefined") e = window.event;
    var src = document.all ? e.srcElement : e.target;

    return src;
}

Utils.isTime = function (val) {
    var reg = /^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}$/;

    return reg.test(val);
}

Utils.x = function (e) { //当前鼠标X坐标
    return Browser.isIE ? event.x + document.documentElement.scrollLeft - 2 : e.pageX;
}

Utils.y = function (e) { //当前鼠标Y坐标
    return Browser.isIE ? event.y + document.documentElement.scrollTop - 2 : e.pageY;
}

Utils.request = function (url, item) {
    var sValue = url.match(new RegExp("[\?\&]" + item + "=([^\&]*)(\&?)", "i"));
    return sValue ? sValue[1] : sValue;
}

Utils.$ = function (name) {
    return document.getElementById(name);
}

function rowindex(tr) {
    if (Browser.isIE) {
        return tr.rowIndex;
    }
    else {
        table = tr.parentNode.parentNode;
        for (i = 0; i < table.rows.length; i++) {
            if (table.rows[i] == tr) {
                return i;
            }
        }
    }
}

document.getCookie = function (sName) {
    // cookies are separated by semicolons
    var aCookie = document.cookie.split("; ");
    for (var i = 0; i < aCookie.length; i++) {
        // a name/value pair (a crumb) is separated by an equal sign
        var aCrumb = aCookie[i].split("=");
        if (sName == aCrumb[0])
            return decodeURIComponent(aCrumb[1]);
    }

    // a cookie with the requested name does not exist
    return null;
}

document.setCookie = function (sName, sValue, sExpires) {
    var sCookie = sName + "=" + encodeURIComponent(sValue);
    if (sExpires != null) {
        sCookie += "; expires=" + sExpires;
    }

    document.cookie = sCookie;
}

document.removeCookie = function (sName, sValue) {
    document.cookie = sName + "=; expires=Fri, 31 Dec 1999 23:59:59 GMT;";
}

function getPosition(o) {
    var t = o.offsetTop;
    var l = o.offsetLeft;
    while (o = o.offsetParent) {
        t += o.offsetTop;
        l += o.offsetLeft;
    }
    var pos = {top: t, left: l};
    return pos;
}

function cleanWhitespace(element) {
    var element = element;
    for (var i = 0; i < element.childNodes.length; i++) {
        var node = element.childNodes[i];
        if (node.nodeType == 3 && !/\S/.test(node.nodeValue))
            element.removeChild(node);
    }
}