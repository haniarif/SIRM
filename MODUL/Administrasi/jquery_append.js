								
$(document).ready(function() {
            var count = 0;
 
            $("#add_btn").click(function(){
                    count += 1;
                $('#tablediagnosa').append(
                             '<tr class="records">'
                         + '<td ><div id="'+count+'">' + count + '</div></td>'
                         + '<td><input id="input_data2' + count + '" name="id_icd10[]" type="text"><input id="id_icd10' + count + '" name="id_icd10[]" type="hidden"></td>'
                         + '<td><input id="kode_icd10' + count + '" name="kode_icd10[]" ></td>'
                         + '<td><a class="remove_item" href="#" >Delete</a>'
                         + '<input id="rows_' + count + '" name="rows[]" value="'+ count +'" type="hidden"></td></tr>'
                    );
									
										$("#input_data2"+count).tokenInput("../../config/file_json.php?aksi=cari_icd10", {
											preventDuplicates: true,
											theme: "facebook",
											onAdd: function (item) {
												get_icd10(item.id)
											}
										});
									function get_icd10(kode_icd10){
										$.ajax({
											type: 'GET',
											url: '../../config/file_json.php?aksi=get_icd10&kode_icd10='+kode_icd10,
											dataType: 'json',
											success: function(data){
												var icd10 = data[0];
												console.log(icd10);	
												$('#kode_icd10').val(icd10.name);
												$('#id_icd10').val(icd10.id_icd10);
												
											}
										})};
								
                });
 
                $(".remove_item").live('click', function (ev) {
                if (ev.type == 'click') {
                $(this).parents(".records").fadeOut();
                        $(this).parents(".records").remove();
            }
            });
        });

$(document).ready(function() {
            var count = 0;
 
            $("#add_tindakan").click(function(){
                    count += 1;
                $('#tabletindakan').append(
                             '<tr class="records">'
                         + '<td ><div id="'+count+'">' + count + '</div></td>'
                         + '<td><input id="input_data3' + count + '" name="id_icd9[]" type="text"></td>'
                         + '<td><input id="kode_icd9' + count + '" name="kode_icd9[]" type="text"></td>'
                         + '<td><a class="remove_item" href="#" >Delete</a>'
                         + '<input id="rows_' + count + '" name="rows[]" value="'+ count +'" type="hidden"></td></tr>'
                    );
									
										$("#input_data3"+count).tokenInput("../../config/file_json.php?aksi=cari_icd9", {
											preventDuplicates: true,
											theme: "facebook",
											onAdd: function (item) {
												get_icd9(item.name)
											}
										});
									function get_icd9(kode_icd9){
										$.ajax({
											type: 'GET',
											url: '../../config/file_json.php?aksi=get_icd9&kode_icd9='+kode_icd9,
											dataType: 'json',
											success: function(data){
												var icd9 = data[0];
												console.log(icd9);	
												$('#kode_icd9').val(icd9.kode_icd9);
												
											}
										})};
								
                });
 
                $(".remove_item").live('click', function (ev) {
                if (ev.type == 'click') {
                $(this).parents(".records").fadeOut();
                        $(this).parents(".records").remove();
            }
            });
        });