// JavaScript Document

function validate(the_form, form){

	var fail = ""
	
	if (the_form == "1"){ //validate landing page
		
		fail += validatefield(form["texti[]"][0].value, "Please enter your first name. \n")
		fail += validatefield(form["texti[]"][1].value, "Please enter your last name. \n")
		fail += validatefield(form["texti[]"][2].value, "Please enter your occupation. \n")
		fail += validatefield(form["texti[]"][3].value, "Please enter your street. \n")
		fail += validatefield(form["texti[]"][4].value, "Please enter your city. \n")
		fail += validatefield(form["texti[]"][5].value, "Please enter your two letter state abbreviation. \n")
		fail += validate_n_field(form["texti[]"][6].value, "Please enter your zip code (numbers only). \n")
		fail += validate_n_field(form["texti[]"][7].value, "Please enter your telephone area code (numbers only). \n")
		fail += validate_n_field(form["texti[]"][8].value, "Please enter your telephone prefix (numbers only). \n")
		fail += validate_n_field(form["texti[]"][9].value, "Please enter the last four digits of your phone number (numbers only). \n")
		fail += validate_n_field(form["texti[]"][10].value, "Please enter a valid e-mail address. \n")
		fail += validateselected(form.confirmation.value, 0, "You must agree to the terms of this survey. \n")
		fail += validateselected(form.contact_method.value, 0, "Please select email or phone. \n")
	}
	
	if (the_form == "2"){  //validate city request page
		var all_fields = true
		for (i=0; i <= form["texti[]"].length - 1; i++) {
			if (form["texti[]"][i].value == "") {all_fields = false}
		}
		if (!all_fields) fail += "Please fill out this entire form and try again."
	}
	
	if (the_form == "3"){ //validate audition page

		fail += validatefield(form["texti[]"][8].value, "Please enter the name of your venue and try again.\n")
		fail += validatefield(form["texti[]"][10].value, "Please enter your full name and try again.\n")
		fail += validatefield(form["texti[]"][11].value, "Please enter your phone # and try again.\n")
		fail += validatefield(form["texti[]"][13].value, "Please enter your e-mail and try again.\n")
		fail += validatefield(form["texti[]"][16].value, "Please enter the venue street address and try again.\n")
		fail += validatefield(form["texti[]"][17].value, "Please enter the venue city and try again.\n")
		fail += validatefield(form["texti[]"][18].value, "Please enter the venue state and try again.\n")
		fail += validatefield(form["texti[]"][19].value, "Please enter the venue ZIP code and try again.\n")
		fail += validatefield(form["texti[]"][30].value, "Please enter the room capacity for room 1 and try again.\n")
		fail += validatefield(form["texti[]"][31].value, "Please enter the keyboard or piano information for room 1 and try again.\n")
	}
	
	if (the_form == "4"){  //validate business partner page
		var all_fields = true
		for (i=0; i <= form["texti[]"].length - 1; i++) {
			if (form["texti[]"][i].value == "") {all_fields = false}
		}
		if (!all_fields) fail += "Please fill out each field and try again."
	}
	if (the_form == "5"){ //validate the shorter audition form
		fail += validatefield(form["texti[]"][0].value, "Please enter your name and try again. =)\n")
		fail += validatefield(form["texti[]"][1].value, "Please enter your city and try again. =)\n")
		fail += validateselected(form["selecti[]"].value == 0, true, "Please select your age range and try again. =)\n")
		fail += validateselected(form["genderi[]"].value == 0, true, "Please select your gender and try again. =)\n")
		fail += validatefield(form["texti[]"][2].value, "Please enter at least one contact phone # or e-mail address and try again. =)\n")


	}
	if (the_form == "6"){
		
		fail += validatefield(form["texti[]"][0].value, "Please enter your name and try again. =)\n")
		fail += validatefield(form["texti[]"][1].value, "Please enter an e-mail address or phone # and try again. =)\n")
	}
	/*	if ((form.student_first_name_2.value == "") && (form.student_last_name_2.value == "")) {}
		else {
			fail += validatestudent_first_name(form.student_first_name_2.value, "2")
			fail += validatestudent_last_name(form.student_last_name_2.value, "2")
			fail += validatestudent_DOB(form.student_DOB_2.value, "2")
			fail += validatestudent_sex(form.student_sex_2, "2")}


		if ((form.student_first_name_3.value == "") && (form.student_last_name_3.value == "")) {}
		else {
			fail += validatestudent_first_name(form.student_first_name_3.value, "3")
			fail += validatestudent_last_name(form.student_last_name_3.value, "3")
			fail += validatestudent_DOB(form.student_DOB_3.value, "3")
			fail += validatestudent_sex(form.student_sex_3, "3")}

		if ((form.student_first_name_4.value == "") && (form.student_last_name_4.value == "")) {}
		else {
			fail += validatestudent_first_name(form.student_first_name_4.value, "4")
			fail += validatestudent_last_name(form.student_last_name_4.value, "4")
			fail += validatestudent_DOB(form.student_DOB_4.value, "4")
			fail += validatestudent_sex(form.student_sex_4, "4")}
	
		fail += validatestudent_address(form.student_address.value)
		fail += validatestudent_city(form.student_city.value)
		fail += validatestudent_ZIP(form.student_ZIP.value)
		fail += validateprimary_phone(form.primary_phone.value)*/
		
	if (fail == "") return true
	else { alert(fail); return false; } 
}
function validatefield(field, message) {
	if (field == "") return message
	return ""
}
function validate_n_field(field, message) {
	if ((field == "") or (isNaN(field)) return message
	return ""
}
function validateselected(field, taboo, message) {
	if (field == taboo) return message
	return ""
}
/*

function validatestudent_first_name(field, nnum) {
		if (field == "") return "Please enter the first name for student #" + nnum + ".\n"
 		return ""
}
function validatestudent_last_name(field, nnum) {
		if (field == "") return "Please enter the last name for student #" + nnum + ".\n"
		return ""
}
function validatestudent_DOB(field, nnum) {
		if (field == "") return "Please enter a valid DOB for student #" + nnum + ".\n"
		return ""
}
function validatestudent_sex(field, nnum) {

		gender_selected = false
		for (i = 0; i <= 1; i++)		{ 	
			if (field[i].checked) {
					gender_selected = true
			}
		}
		if (gender_selected) return ""
		return "Please select student gender for student #" + nnum  + ".\n"
}
function validatestudent_address(field) {
		if (field == "") return "Please enter student address.\n"
		return ""
}
function validatestudent_city(field) {
		if (field == "") return "Please enter student city.\n"
		return "";
}
function validatestudent_ZIP(field) {
		if (field == "") return "Please enter student ZIP code.\n";
		return ""
}
function validateprimary_phone(field) {
		if (field == "") return "Please enter a contact phone number.\n"
		return ""
}*/
