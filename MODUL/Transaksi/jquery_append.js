$(document).ready(function() {
            var count = 0;
 
            $("#add_btn").click(function(){
                    count += 1;
                $('#container').append(
                             '<tr class="records">'
                         + '<td ><div id="'+count+'">' + count + '</div></td>'
                         + '<td><input id="nama_layanan' + count + '" name="nama_layanan' + count + '" type="text"></td>'
                         + '<td><input id="nama_kamar' + count + '" name="nama_kamar' + count + '" type="text"></td>'
                         + '<td><input id="kelas' + count + '" name="kelas' + count + '" type="text"></td>'
						 + '<td><input id="frekuensi' + count + '" name="frekuensi' + count + '" type="text"></td>'
						 + '<td><input id="petugas' + count + '" name="petugas' + count + '" type="text"></td>'
						 + '<td><input id="dokter' + count + '" name="dokter' + count + '" type="text"></td>'
						 + '<td><input id="dokter2' + count + '" name="dokter2' + count + '" type="text"></td>'
                         + '<td><a class="remove_item" href="#" >Delete</a>'
                         + '<input id="rows_' + count + '" name="rows[]" value="'+ count +'" type="hidden"></td></tr>'
                    );
                });
 
                $(".remove_item").live('click', function (ev) {
                if (ev.type == 'click') {
                $(this).parents(".records").fadeOut();
                        $(this).parents(".records").remove();
            }
            });
        });