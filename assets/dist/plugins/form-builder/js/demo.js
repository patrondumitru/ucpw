jQuery(function($) {
  var fields = [];

  var replaceFields = [];

  var actionButtons = [{
    id: 'smile',
    className: 'btn btn-success',
    label: 'Create Form',
    type: 'button',
    events: {
      click: function() {
        alert('😁😁😁 !SMILE! 😁😁😁');
      }
    }
  }];

  var templates = {};

  var inputSets = [];

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
  var disabledAttrs = ['type','name'];

  var fbOptions = {
    subtypes: {
      text: ['datetime-local']
    },
    onSave: function(e, formData) {
      toggleEdit();
      $('.render-wrap').formRender({
        formData: formData,
        templates: templates
      });
      window.sessionStorage.setItem('formData', JSON.stringify(formData));
    },
    stickyControls: {enable: true},
    sortableControls: true,
    fields: fields,
    templates: templates,
    inputSets: inputSets,
    typeUserDisabledAttrs: typeUserDisabledAttrs,
    typeUserAttrs: typeUserAttrs,
    disableInjectedStyle: false,
    actionButtons: actionButtons,
    disableFields: ['autocomplete'],
    replaceFields: replaceFields,
    disabledFieldButtons: {},
    // controlPosition: 'left'
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

  var formBuilder = $('.build-wrap').formBuilder(fbOptions);
  var fbPromise = formBuilder.promise;

  fbPromise.then(function(fb) {
    var apiBtns = {
      showData: fb.actions.showData,
      clearFields: fb.actions.clearFields,
      getData: function() {
        console.log(fb.actions.getData());
      },
      setData: function() {
        fb.actions.setData(setFormData);
      },
      addField: function() {
        var field = {
            type: 'text',
            class: 'form-control',
            label: 'Text Field added at: ' + new Date().getTime()
          };
        fb.actions.addField(field);
      },
      removeField: function() {
        fb.actions.removeField();
      },
      testSubmit: function() {
        var formData = new FormData(document.forms[0]);
        console.log('Can submit: ', document.forms[0].checkValidity());
        // Display the key/value pairs
        console.log('FormData:', formData);
        for(var pair of formData.entries()) {
           console.log(pair[0]+ ': '+ pair[1]);
        }
      },
      resetDemo: function() {
        window.sessionStorage.removeItem('formData');
        location.reload();
      }
    };

    Object.keys(apiBtns).forEach(function(action) {
      document.getElementById(action)
      .addEventListener('click', function(e) {
        apiBtns[action]();
      });
    });

    document.getElementById('setLanguage')
    .addEventListener('change', function(e) {
      fb.actions.setLang(e.target.value);
    });

    document.getElementById('getXML').addEventListener('click', function() {
      alert(formBuilder.actions.getData('xml'));
    });
    document.getElementById('getJSON').addEventListener('click', function() {
      alert(formBuilder.actions.getData('json', true));
    });
    document.getElementById('getJS').addEventListener('click', function() {
      alert('check console');
      console.log(formBuilder.actions.getData());
    });
  });

  document.getElementById('edit-form').onclick = function() {
    toggleEdit();
  };
});
