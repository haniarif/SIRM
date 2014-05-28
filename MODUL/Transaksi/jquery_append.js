$(document).ready(function() {
            var count = 0;
 
            $("#add_btn").click(function(){
                    count += 1;
<<<<<<< HEAD
                $('#tablemutasi').append(
                             '<tr class="records">'
                         + '<td ><div id="'+count+'">' + count + '</div></td>'
                         + '<td><input id="input_data2' + count + '" name="id_layanan[]" type="text"></td>'
						 + '<td><input id="frekuensi' + count + '" name="frekuensi[]" type="text"></td>'
                         + '<td><a class="remove_item" href="#" >Delete</a>'
                         + '<input id="rows_' + count + '" name="rows[]" value="'+ count +'" type="hidden"></td></tr>'
                    );
							$(document).ready(function() {
										$("#input_data2"+count).tokenInput("../../config/file_json.php?aksi=cari_layanan", {
											preventDuplicates: true,
											theme: "facebook"				
										});
									});
				 });
=======
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
>>>>>>> 429e6a569239838b0f3d7fe6eb43c467f7846aec
 
                $(".remove_item").live('click', function (ev) {
                if (ev.type == 'click') {
                $(this).parents(".records").fadeOut();
                        $(this).parents(".records").remove();
            }
            });
        });