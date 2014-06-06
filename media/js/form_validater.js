(function(){
   $form_validater = {
      set_ask_question_form_rules: function(){
         $('#ask_question_form').validate({
            rules: {
               'HomeworkQuestions[name]'    : "required",
               'HomeworkQuestions[email]'   : {
                  required:true,
                  email:true 
               },
               'HomeworkQuestions[phone_num]'   : "required",
               'HomeworkQuestions[grade]'   : "required",
               'HomeworkQuestions[school]'  : "required",
               'HomeworkQuestions[course]'        : "required",
               'HomeworkQuestions[question]'      : "required"
            },
            messages: {
               'HomeworkQuestions[name]'    : "Enter your name.",
               'HomeworkQuestions[email]'   :  {
                  required:"Enter your email.",
                  email:"Enter valid email." 
               },
               'HomeworkQuestions[phone_num]'   : "Enter your phone number.",
               'HomeworkQuestions[grade]'   : "Enter your grade.",
               'HomeworkQuestions[school]'  : "Enter your school.",
               'HomeworkQuestions[course]'        : "Enter course.",
               'HomeworkQuestions[question]'      : "Enter your question."
            }
         });
      },
      set_register_form_rules : function(){
         $('#register_form').validate({
            rules: {
               'RegisterUsers[name]'    : "required",
               'RegisterUsers[email]'   : {
                  required:true,
                  email:true 
               },
               'RegisterUsers[phone_num]'   : "required",
               'RegisterUsers[grade]'   : "required",
               'RegisterUsers[school]'  : "required",
               'RegisterUsers[course]'  : "required",
               'RegisterUsers[password]'  : "required",
               'RegisterUsers[package]'   : "required",
               'RegisterUsers[confirm_password]'  : {
                  'required':true,
                  'equalTo':'#RegisterUsers_password'
               }
            },
            messages: {
               'RegisterUsers[name]'    : "Enter your name.",
               'RegisterUsers[email]'   :  {
                  required:"Enter your email.",
                  email:"Enter valid email." 
               },
               'RegisterUsers[phone_num]'   : "Enter your phone number.",
               'RegisterUsers[grade]'   : "Enter your grade.",
               'RegisterUsers[school]'  : "Enter your school.",
               'RegisterUsers[course]'  : "Enter course.",
               'RegisterUsers[password]': "Enter password.",
               'RegisterUsers[package]'   : "Select Package",
               'RegisterUsers[confirm_password]'  : {
                  'required':"Enter confirm password.",
                  'equalTo':'confirm password does not match with password.'
               }
            }
         });
      },
      set_admin_login_rules: function(){
         $('#admin_login_form').validate({
            rules: {
               'Users[email]'   : {
                  required:true,
                  email:true 
               }
            },
            messages: {
               'Users[email]'   :  {
                  required:"Enter email.",
                  email:"Enter valid email." 
               }
            }
         });
      },
      set_student_login_rules: function(){
         $('#login_form').validate({
            rules: {
               'RegisterUsers[email]'   : {
                  required:true,
                  email:true 
               },
               'RegisterUsers[password]'  : "required"
            },
            messages: {
               'RegisterUsers[email]'   :  {
                  required:"Enter email.",
                  email:"Enter valid email." 
               },
               'RegisterUsers[password]' :"Password required." 
            }
         });
      },
      set_practice_exam_form_rules: function(){
         $('#PracticeExamRequest_form').validate({
            rules: {
               'PracticeExamRequest[name]'    : "required",
               'PracticeExamRequest[email]'   : {
                  required:true,
                  email:true 
               },
               'PracticeExamRequest[phone_num]'   : "required",
               'PracticeExamRequest[grade]'   : "required",
               'PracticeExamRequest[school]'  : "required",
               'PracticeExamRequest[course]'  : "required",
               'PracticeExamRequest[exam_type]'  : "required",
               'PracticeExamRequest[exam_date]'  : "required",
               'PracticeExamRequest[exam_topics]'  : "required"
            },
            messages: {
               'PracticeExamRequest[name]'    : "Enter your name.",
               'PracticeExamRequest[email]'   :  {
                  required:"Enter your email.",
                  email:"Enter valid email." 
               },
               'PracticeExamRequest[phone_num]'   : "Enter your phone number.",
               'PracticeExamRequest[grade]'   : "Enter your grade.",
               'PracticeExamRequest[school]'  : "Enter your school.",
               'PracticeExamRequest[course]'  : "Enter course.",
               'PracticeExamRequest[exam_type]'  : "Select exam type.",
               'PracticeExamRequest[exam_date]'  : "Enter exam date.",
               'PracticeExamRequest[exam_topics]'  : "Enter exam topices."
            }
         });
      }
   }
})(jQuery);

