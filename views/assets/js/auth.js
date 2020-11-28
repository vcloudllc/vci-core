function onLoad() {
    gapi.load('auth2', function() {
        gapi.auth2.init();
    });
}

function onSignIn(googleUser) {
    $.ajax({
        url: "/login",
        method: "POST",
        data: {
            "google_id_token": googleUser.getAuthResponse().id_token
        }
    }).then(res => {
        if(res) {
            user = JSON.parse(res);
            window.location = '/home';
        }
    });
}

function signOut() {
    gapi.auth2.getAuthInstance().signOut().then(function () {
        $.ajax({
            url: "/logout",
            method: "GET"
        }).then(res => {
            window.location = '/';
        });
    });
}