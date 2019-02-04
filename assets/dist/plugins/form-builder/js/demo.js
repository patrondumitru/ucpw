$(document).ready(function() {
   // $("div .nav-tabs-custom").tabs();
var page = 0;
var formBuilder = []; 
document.getElementById('add-tab').addEventListener('click', function() {
        //var num_tabs = $("div .nav-tabs-custom ul li").length + 1;
        $("#next" + page).html('Next');
        page = page +1;

        $("ul.nav-tabs").append("<li><a href='#page_" + page + "' data-toggle='tab'>Page " + page + " </a></li>");
        var formappend ='';
        formappend = "<div class='tab-pane' id='page_" + page + "'>";        
        formappend += "<div id='stage" + page + "' class='build-wrap'></div><div class='box-footer'><button type='button' id='prev" + (page-1) + "' class='btn btn-default controlpage'>Back</button><button type='button' id='next" + page + "'class='btn btn-info pull-right controlpage'>Next</button></div></div>";

        $("div .tab-content").append(formappend);
        if ($("#next" + page).is(':last-child')){ $("#next" + page).html('Save form');}
       
        
        
        formBuilder[page] = $('#stage'+page).formBuilder(fbOptions);
        //var formBuilder = $('#stage'+page).formBuilder(fbOptions);
        
        //var fbPromise = formBuilder[page].promise;
        //  var formBuilder = $('#stage1').formBuilder(fbOptions);
        // var fbPromise = formBuilder.promise;


          document.getElementById("next" + page).addEventListener('click', function(pag) {                
              if (!$("div .nav-tabs-custom ul li.active").is(':last-child')){
              $("div .tab-pane.active").removeClass('active').next().addClass('active');
              $("div .nav-tabs-custom ul li.active").removeClass('active').next().addClass('active');
              }
              

          });
          document.getElementById("prev" + (page-1)).addEventListener('click', function() {            
            $("div .tab-pane.active").removeClass('active').prev().addClass('active');
            $("div .nav-tabs-custom ul li.active").removeClass('active').prev().addClass('active'); 
          });
    });



  document.getElementById('basicnext').addEventListener('click', function() {
    var num_tabs = $("div .nav-tabs-custom ul li") ;    
    if (num_tabs.length <= 2) alert('Add new page');
    else{
      $("div .tab-pane.active").removeClass('active').next().addClass('active');
      $("div .nav-tabs-custom ul li.active").removeClass('active').next().addClass('active'); 
    };

  });


$('#save-form').click(function(e){
  e.preventDefault();
  for (var i = 1; i <= page; i++) {
    console.log('i=' + i + ' page=' + page);
    console.log(formBuilder[i].actions.getData('json',true));  //getData('json',true)
    console.log(formBuilder[i].actions.showData());  //getData('json',true)
  }

});
//});

//jQuery(function($) {
  var fields = [];

  var replaceFields = [];

  var actionButtons = [{
    id: 'smile',
    className: 'btn btn-success',
    label: 'Create Form',
    type: 'button',
    events: {
      click: function() {
        //var formdata = formBuilder.actions.getData('json', true);
        $.ajax({
            type: "POST",
            url: "http://ucpw.test/admin/project/saveform/",
            // The key needs to match your method's input parameter (case-sensitive).
            data: formBuilder.actions.getData('json'),//JSON.stringify({ data: formdata }),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(data){alert(data);},
            failure: function(errMsg) {alert(errMsg);}
        });
        //alert('😁😁😁 !SMILE! 😁😁😁');
      }
    }
  }];

  var typeUserDisabledAttrs = {
    autocomplete: ['access']
  };

  var typeUserAttrs = {
    text: {
      fieldClass: {
        label: 'Field class',
        options: {
          'input-sm': 'Small',
          'input-md': 'Medium',
          'input-lg': 'Large'
        }        
      },
      pageName: {
        label: 'Page name title',
        value: 'Field Title',
      },
      groupName: {
        label: 'Group name title',  
        value: 'Field Title',           
      }, 
      groupClass: {
        label: 'Filed alert color',
        options: {
          'default': 'Default',
          'has-success': 'Success',
          'has-warning': 'Warning',
          'has-error': 'Danger'
        }        
      },      
      groupGrid: {
        label: 'Field grid type',
        options: {
          'col-xs': 'Phones',
          'col-sm': 'Tablets',
          'col-md': 'Desktops',
          'col-lg': 'Large Desktops'
        },
        description:'Use for different devices :xs (phones), sm (tablets), md (desktops), and lg (larger desktops)'        
      },
      groupGridSize: {
        label: 'Field grid size',
        options: {
          '12': '12','11': '11','10': '10','9': '9','8': '8','7': '7','6': '6','5': '5','4': '4','3': '3','2': '2','1': '1'
        }        
      },
      fieldRules: {
        label: 'Field rule',
        options: {
          'alpha': 'Alphabetical characters',
          'alpha_numeric': 'Alpha-numeric characters',
          'numeric': 'Numeric characters',
          'decimal': 'Decimal number',
          'integer': 'Integer number',
          'is_natural': 'Natural number: 0, 1, 2, 3, etc',
          'is_natural_no_zero': 'Natural number, but not zero: 1, 2, 3, etc',
          'valid_url': 'Contain a valid URL',
          'valid_email': 'Valid email address',
          'valid_ip': 'Accepts an optional parameter of ‘ipv4’ or ‘ipv6’ to specify an IP format'
        }        
      }
    }
  };

  // test disabledAttrs
  var disabledAttrs = ['type','className'];

  var fbOptions = {
    subtypes: {
      text: ['datetime-local']
    },
    onSave: function(e, formData) {
      toggleEdit();
      console.log(formData);
      window.sessionStorage.setItem('formDataPage', page);      
      window.sessionStorage.setItem('formData', JSON.stringify(formData));
    },
    stickyControls: {enable: true},
    sortableControls: false,
    fields: fields,
    //templates: templates,
    //inputSets: inputSets,
    typeUserDisabledAttrs: typeUserDisabledAttrs,
    typeUserAttrs: typeUserAttrs,
    disableInjectedStyle: false,
    //actionButtons: actionButtons,
    disableFields: ['autocomplete','paragraph','button','hidden','number','header','date'],
    //replaceFields: replaceFields,
    //fieldRemoveWarn: true, // defaults to false 
    disabledFieldButtons: {},
    //controlPosition: 'right',
    showActionButtons: false,
    disabledAttrs
  };

  var formData = window.sessionStorage.getItem('formData');
  var editing = true;

  if (formData) {
    fbOptions.formData = JSON.parse(formData);
  }

  /**
   * Toggles the edit mode for the demo
   * @return {Boolean} editMode
   */
  function toggleEdit() {
    document.body.classList.toggle('form-rendered', editing);
    return editing = !editing;
  }

  var setFormData = '[{"type":"text","label":"Full Name","subtype":"text","className":"form-control","name":"text-1476748004559"},{"type":"select","label":"Occupation","className":"form-control","name":"select-1476748006618","values":[{"label":"Street Sweeper","value":"option-1","selected":true},{"label":"Moth Man","value":"option-2"},{"label":"Chemist","value":"option-3"}]},{"type":"textarea","label":"Short Bio","rows":"5","className":"form-control","name":"textarea-1476748007461"}]';

//  var formBuilder = $('#stage1').formBuilder(fbOptions);
 // var fbPromise = formBuilder.promise;

  

  //document.getElementById('edit-form').onclick = function() { toggleEdit();};
});



