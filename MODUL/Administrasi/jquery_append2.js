								
$(document).ready(function() {
            var count = 0;
 
            $("#add_btn").click(function(){
                    count += 1;
                $('#tablediagnosa').append(
                             '<tr class="records">'
                         + '<td ><div id="'+count+'">' + count + '</div></td>'
                         + '<td><input id="input_data2' + count + '" name="nama_icd10' + count + '" type="text"></td>'
                         + '<td><input id="kode_icd10' + count + '" name="kode_icd10' + count + '" type="text" style="width:2px;"></td>'
                         + '<td><a class="remove_item" href="#" >Delete</a>'
                         + '<input id="rows_' + count + '" name="rows[]" value="'+ count +'" type="hidden"></td></tr>'
                    );
									
										$("#input_data2"+count).tokenInput("../../config/file_json.php?aksi=cari_icd10", {
											preventDuplicates: true,
											theme: "facebook",
											onAdd: function (item) {
												cari_icd10(item.name)
											}
											
										});
								
                });
 
                $(".remove_item").live('click', function (ev) {
                if (ev.type == 'click') {
                $(this).parents(".records").fadeOut();
                        $(this).parents(".records").remove();
            }
            });
        });