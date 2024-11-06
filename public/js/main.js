function inputInteger(input) {
    $(input).on('keypress', (evt) => {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /^[0-9]+$/;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }

        if (evt.target.value.length >= (evt.target.maxLength >= 0 ? evt.target.maxLength : 11)) {
            theEvent.preventDefault();
        }
    });

    $(input).bind('paste', function (e) {
        e.preventDefault();
    });
}

function initMap() {
    if (!document.getElementById("load-map")) {
        return;
    }

    var center = { lat: -27.0943398, lng: -52.6172714 };

    var map = new google.maps.Map(document.getElementById("load-map"), {
        zoom: 12,
        center: center,
        styles: [
            {
                "featureType": "poi",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "poi.business",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "stylers": [
                    {
                        "visibility": "on"
                    }
                ]
            }
        ]
    });

    var vehicles = [
        { placa: 'ASD-1S57', motorista: 'Joaquim Silva', lat: -27.0943398, lng: -52.6172714 },
        { placa: 'QWE-4T46', motorista: 'João Silva', lat: -27.068548, lng: -52.624256 },
        { placa: 'XYZ-7S80', motorista: 'Maria Souza', lat: -27.085813, lng: -52.614785 },
        { placa: 'ZXC-2D45', motorista: 'Carlos Pereira', lat: -27.106509, lng: -52.613646 }
    ];

    vehicles.forEach(function (vehicle) {
        var marker = new google.maps.Marker({
            position: { lat: vehicle.lat, lng: vehicle.lng },
            map: map,
            title: vehicle.placa,
            icon: {
                url: ' data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAxXpUWHRSYXcgcHJvZmlsZSB0eXBlIGV4aWYAAHjabVBRDsMgCP3nFDuCCCIex7Yu2Q12/KHSpm57CU/kkScC7f16wqMjIgOnrFJEgoELl1gt0TBRB2PgwQMUXcO1DpcQrUS9c15VvP+s42Uwj2pZuhnp7sK2CoXdX7+M/CHqE/UhDjcq+zXyENAN6vxWkKL5/oWthRU6Azptx7KTnztn296R7B2KsRFSMCaSOQD1YKBqAhoHEmtEypYziXEi9UlsIf/2dAI+bT9aNG7By9kAAAGEaUNDUElDQyBwcm9maWxlAAB4nH2RPUjDQBzFX1u1ohURO4g4ZKhOdtEijrUKRagQaoVWHUwu/YImDUmKi6PgWnDwY7Hq4OKsq4OrIAh+gDg7OCm6SIn/SwotYjw47se7e4+7d4C/UWGq2RUHVM0y0smEkM2tCsFX9KMHQ4hhVmKmPieKKXiOr3v4+HoX5Vne5/4cA0reZIBPII4z3bCIN4hnNi2d8z5xmJUkhficeNKgCxI/cl12+Y1z0WE/zwwbmfQ8cZhYKHaw3MGsZKjEMeKIomqU78+6rHDe4qxWaqx1T/7CUF5bWeY6zTEksYgliBAgo4YyKrAQpVUjxUSa9hMe/lHHL5JLJlcZjBwLqEKF5PjB/+B3t2ZhespNCiWA7hfb/hgHgrtAs27b38e23TwBAs/Aldb2VxvA7Cfp9bYWOQIGt4GL67Ym7wGXO8DIky4ZkiMFaPoLBeD9jL4pBwzfAn1rbm+tfZw+ABnqKnUDHBwCE0XKXvd4d29nb/+eafX3AwA4ct9IxeMRAAANeGlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNC40LjAtRXhpdjIiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iCiAgICB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZlbnQjIgogICAgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIgogICAgeG1sbnM6R0lNUD0iaHR0cDovL3d3dy5naW1wLm9yZy94bXAvIgogICAgeG1sbnM6dGlmZj0iaHR0cDovL25zLmFkb2JlLmNvbS90aWZmLzEuMC8iCiAgICB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgIHhtcE1NOkRvY3VtZW50SUQ9ImdpbXA6ZG9jaWQ6Z2ltcDpiZWEwZWY1Ny1hN2E0LTRmZjYtODIwNi00N2MxNDRlMDU0NmMiCiAgIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NjQwM2MyNjMtNTgzNS00YmNkLWEzZDQtODI1ZTdiMTAwMWQ3IgogICB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6ZjkwYTY3MGItZTJlNC00ODgwLWJiZjktODY4ZWE4MTc4OWU2IgogICBkYzpGb3JtYXQ9ImltYWdlL3BuZyIKICAgR0lNUDpBUEk9IjIuMCIKICAgR0lNUDpQbGF0Zm9ybT0iTGludXgiCiAgIEdJTVA6VGltZVN0YW1wPSIxNzMwOTI2MDE5Njc2ODc3IgogICBHSU1QOlZlcnNpb249IjIuMTAuMzYiCiAgIHRpZmY6T3JpZW50YXRpb249IjEiCiAgIHhtcDpDcmVhdG9yVG9vbD0iR0lNUCAyLjEwIgogICB4bXA6TWV0YWRhdGFEYXRlPSIyMDI0OjExOjA2VDE3OjQ2OjU4LTAzOjAwIgogICB4bXA6TW9kaWZ5RGF0ZT0iMjAyNDoxMTowNlQxNzo0Njo1OC0wMzowMCI+CiAgIDx4bXBNTTpIaXN0b3J5PgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2dDpjaGFuZ2VkPSIvIgogICAgICBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjNmNWUxMGIxLTIxOWEtNDFkNi05ODBkLTEyY2U3OTRlZjM4OCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iR2ltcCAyLjEwIChMaW51eCkiCiAgICAgIHN0RXZ0OndoZW49IjIwMjQtMTEtMDZUMTc6NDY6NTktMDM6MDAiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5PgogIDwvcmRmOkRlc2NyaXB0aW9uPgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgIAo8P3hwYWNrZXQgZW5kPSJ3Ij8+evji7wAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAAHYgAAB2IBOHqZ2wAAAAd0SU1FB+gLBhQuO8VbtiYAAAcISURBVGje7Zp5bFVFFMZ/r6UthYIQCmgghEVTXAAXqmGtgAtDEKkaCFhCAiQooERFRPQCMmI0IIZgRKIhKotB0YiKV0QMqwqCkQIqiIgLQUCiQNkKbf2j34vDzSvvvsd7isaTTHrfvTPnzDdztjlT+I9QJNUMPfwIkAe0BC7RM0AZsA/YA5RZTNUFB8TDrwV0A/oBPYDLgewaupcDO4BVwNvAeos5/Y8C8fDzgBHAGKBNkmy+B14AXrKYo38rEA8/AygBngKaOZ9OAV8A64BtwE/AYaAKaAC0AK4CugKFQI4zdi/wKLDQYirTDsTDbwK8DNzmvN6hVV1sMfvVLwvIl41kAEeBg1E18vCbAgOA0UCBw+s9YLjFHEwbEA+/HbAUaKVX+4DHgAXAGaAdcCfQSyufB2Sqb4UMfhvwCbAE2ArU0u5Ok3MA+AG43WK2phyIh18I+EAjvVoC3AscAm4CPKCLVj8MVQLrgSeBFeI7B7hL3w8BvS1mUxhmGSFBtAWWSVglMAkYqNV+E1gur5WRwAZnaMyHWpRa4jlJMhoByzz8gpQA8fDry002ltE+bDEWuB7YLFWKnKfnvAPYBBSK9ziBaQK8rTmc947MVFwAmGExMz38nsBHAY91vtQMWOHh97CY54AZen+F85ycjXj4NwIrBXgVcIsYrwYuSlO2cRjoDnwj2ynS7vS0mNUJA1Gs+Fz+/jjQAdivOFEA7JbKlYVUnxaygToh+n8r1b0Y+EpjNgCda4oxtc7B7Bago55nW8wuD/9ZgSgFulvM4QTd9zy53qw4XdsCky1mnIf/PDBewG6SSie0I0uVOx1T+pGnGFBbbneuvE3bEBiqtBhzPfzlUp0o5dQwj5OKRWVKY+oC71hMcWhj9/DztSMAbylajxWIqI/PAfrIZuK1KxUkUUbQ0GmttSBBqg2Mley39O5WD79RIl6rlzPpxR5+LjAoRcZ8HWCUCeQrPxsEzI/Rd5BkL9bvXKBnIkC66e8JYI0idn6KgDygSecAnZRgNgeGxQCTL9lrNRcCahkXyNX6u91iyhxg6aDWcvHNgeFy7WctqtL7r/W7QyJAWjtZLTK6dNAZOZOmspMK4LVAn6sCc2kTCoh0sp6T3ZLiCB415MZK2ZuqFSlGHI0R8d251PPwa4eJI1lO6h3VyzopBpIJvAE878iokMsPUlT2cWdsltzzOYFUyu/jBK7TaVCrQuDVQNxoWMMZ351LleYY10aOO2ijPvvAP1jpORCYy0lnF2sGIj3dGzD6nYFudbVLu2SwYVqFc1KM9X2XeNYNyNoZMPJfYuVbNXmtbfrbXqWeDYHvXSymQq4wN2Qr0diSGr53EM8uAVkbNYd2gbmFAvKZE5Day8+XO9/XeviZQH/gduVKFdL7Qj1n6FuxWn8PP1v67faLqF9/8VwbsI+VApEfmFsoICskMAIUK9/52Pl+Qsa3EJgg1RihM/h6YITFlKu884baBL07q5/GThCvrID+r5DsYs2lMjCPuEB2KFUHGKKVnOV8z5U+363ErgroLGERPQPcr5LPACWdBPtp7FjxOi3eUZol2UP0e0sMe42bxo+Wn0eMFmmneupwNdDxKCeUDEaTu4E6z+cG2Ab7DQC+dPo10e511LnlZgGMRvtRFjMnUSD1gO8UdXdLT1sBGxWkzihzjZ7rJwdqWE8AD8Y4/5+rX45i2zHgBhW8S+U9fwUuU+4XM8LGpDUsLC+i5DTQW4Eqy2IWFVHyG9BXY7PVuktwjhLOacpmswMtXr8MBbwxFvNhESXTJAtgosWsS7b4kC0vca12oJ/qUNNkyOmgp4GJOrMs1Q5tlj2VJ11p9PDbA58qUP0uG9kiFfESLMrFqzxaqdo1crsNpGad4pVP407CYkp1Rq+Uii0HOlrMFBnrwRSA+A0YKJ7Xa9cbSObIMDXgRGq/47XtERUERgKvyxlMAYY6x+OwdAp4ReP3A4OBF1XoqAIesZjpKav9iqYDD8lW8lSBXwBkWMw9qqZMAbY7eVUsqtBpbypQoLGZCojzxfsM8EBYEMnej/QD5jnZ6BFV0edYzI+6Q2ym1Kalk5r/oeuCUmCvxVR5+C2AUVLd+o6aDbOY99J2P+KAaQHMVmkn4uRFa4D3lS/tspgjMQril1J9Y9VX5dBs55zxLnCfxfycTCWcJMFEFHmj9yKRGAW2w9qxStWKG8Swoyp5xanKrZK67T3vW10B6kP1PUlugsNPyPN9kMy9YUqBOIAGKyfKDDmkAhhqMQtTIT9VwQyLWQQ8ngj2VIFIKRDRM4oD8WiuYlLKKB3/wpFF9b1J3xq6LAPuOFfedEEAcdzsSv66X4nSZqpvno6kWmZagAhMMxWoW+rVHqCrxexNh7y0ARGYdlTfPUZUEt3Kv5U8/IKwd+X/E/An4QsXQ25CClwAAAAASUVORK5CYII='
            }
        });

        var infoWindowContent = `
            <div>
                <h5>Placa: ${vehicle.placa}</h5>
                <p>Motorista: ${vehicle.motorista}</p>
            </div>
        `;

        var infoWindow = new google.maps.InfoWindow({
            content: infoWindowContent
        });

        marker.addListener('click', function () {
            infoWindow.open(map, marker);
        });
    });
}

$(document).ready(function () {
    $('.input-license-plate').mask('AAA-AAAA');

    $('.input-renavam').mask('999999999999999');
    $('.input-year').mask('0000')
    $('.input-cpf').mask('000.000.000-00', { reverse: true });

    inputInteger('.input-integer');

    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
        spOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

    $('.input-phone').mask(SPMaskBehavior, spOptions);

    $('.select2').select2({
        theme: "bootstrap-5",
    });
});