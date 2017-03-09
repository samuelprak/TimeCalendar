var ets = {};

function getJSON(jsontext){
    try{
        return JSON.parse(jsontext);
    }
    catch(e){
        console.log(e);
        return [];
    }
}

/* Universities */

function getUniversity(code, callback){
    $.get("data.php?action=getUniversity&code=" + code, function(data){
        callback(getJSON(data));
    });
}

function getUniversityList(callback){
    $.get("data.php?action=getUniversityList", function(data){
        callback(getJSON(data));
    });
}

/* Grades */

function getGrade(id, callback){
    $.get("data.php?action=getGrade&id=" + id, function(data){
        callback(getJSON(data));
    });
}

function getGradeList(code, callback){
    $.get("data.php?action=getGradeList&code=" + code, function(data){
        callback(getJSON(data));
    });
}

/* Groups */

function getGroup(id, callback){
    $.get("data.php?action=getGroup&id=" + id, function(data){
        callback(getJSON(data));
    });
}

function getGroupList(id, callback){
    $.get("data.php?action=getGroupList&id=" + id, function(data){
        callback(getJSON(data));
    });
}


function getUniversityAndGrade(id, callback){
    getGrade(id, function(grade){
        getUniversity(grade.universitycode, function(university){
            getGroupList(id, function(grouplist){
                callback(university, grade, grouplist);
            });
        });
    });
}

function generateUrl(university, grouplist){
    return university.url.replace("{}", grouplist) + "&firstDate=2016-09-02&lastDate=2017-08-31";
}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

/* Cookies */

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}