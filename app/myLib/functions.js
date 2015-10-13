
/*****

 FILE FUNCTIONS  TONG HOP CAC HAM HAY DUNG 

*****/


// FUNCTION UPLOAD ANH SU DUNG KCFINDER . CHU Y THAY DUONG DAN DEN FOLDER KCFINDER
function openKCFinder() {
    window.KCFinder = {
        callBack: function(url) {
            window.KCFinder = null;
            var div = document.getElementById("preview_img"); // Lay id cua div preview image
            div.innerHTML = '<div style="margin:5px">Loading...</div>';
            var img = new Image();
            img.src = url;
            img.onload = function() {
                div.innerHTML = '<img id="img" width="320" src="' + url + '" />' + '<input type="hidden" name="file" value="' + url+ '" />';
                var img = document.getElementById('img');
                var o_w = img.offsetWidth;
                var o_h = img.offsetHeight;
                var f_w = div.offsetWidth;
                var f_h = div.offsetHeight;
                if ((o_w > f_w) || (o_h > f_h)) {
                    if ((f_w / f_h) > (o_w / o_h))
                        f_w = parseInt((o_w * f_h) / o_h);
                    else if ((f_w / f_h) < (o_w / o_h))
                        f_h = parseInt((o_h * f_w) / o_w);
                    img.style.width = f_w + "px";
                    img.style.height = f_h + "px";
                } else {
                    f_w = o_w;
                    f_h = o_h;
                }
                // img.style.marginLeft = parseInt((div.offsetWidth - f_w) / 2) + 'px';
                // img.style.marginTop = parseInt((div.offsetHeight - f_h) / 2) + 'px';
                img.style.visibility = "visible";
            }
        }
    };
    window.open('{{asset("public")}}/backend/js/kcfinder/browse.php?type=images&dir=../../upload/images',
        'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
    );
}


// FUNCTION UPLOAD MULTI IMAGE SU DUNG KCFINDER. IMAGE DUOC EXPORT RA DANG UL > LI > IMG.
function openKCFinder() {
    window.KCFinder = {
        callBackMultiple: function(files) {
            window.KCFinder = null;
            var div = document.getElementById("preview_img");
            for (var i = 0; i < files.length; i++){
                    var li = document.createElement('li');
                    li.setAttribute('class','img_group');
                    li.setAttribute('id','img_group_'+i);
                    var img = document.createElement('img');
                    img.src= files[i];
                    img.setAttribute('width','100%');
                    li.appendChild(img);

                    var btn_remove = document.createElement('span');
                    btn_remove.setAttribute('class', 'remove_btn');
                    btn_remove.setAttribute('onclick', 'remove_file("#img_group_'+i+' ")');
                    
                    var img_remove = document.createElement('img');
                    img_remove.setAttribute('title', 'Remove file');
                    img_remove.src="{{asset('public')}}/backend/images/Remove.png";
                    btn_remove.appendChild(img_remove); 
                
            var elem = document.createElement("input");
            elem.type = "hidden";
            elem.setAttribute('class','img_group_input');
            elem.setAttribute('name','img[]');
            elem.value = files[i];
            li.appendChild(elem);

            li.appendChild(btn_remove);

            div.appendChild(li);

            }
    }
    }
    window.open('{{asset("public")}}/backend/js/kcfinder/browse.php?type=images&dir=../../upload/album', 'kcfinder_multiple', 'status=0, toolbar=0, location=0, menubar=0, ' + 'directories=0, resizable=1, scrollbars=0, width=800, height=600'
    );
}


