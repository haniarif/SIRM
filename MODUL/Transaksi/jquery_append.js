$(document).ready(function() {
            var count = 0;
 
            $("#add_btn").click(function(){
                    count += 1;
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
 
                $(".remove_item").live('click', function (ev) {
                if (ev.type == 'click') {
                $(this).parents(".records").fadeOut();
                        $(this).parents(".records").remove();
            }
            });
        });