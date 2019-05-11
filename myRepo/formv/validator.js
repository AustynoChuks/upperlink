  /*
  GENERAL-PURPOSE FORM VALIDATION SCRIPT
  EL ACADEMY
  BY   E W U R U M   A U G U S T I N E   C H U K W U D I
  E M A I L : ewurumaugustine@gmail.com
  T E L   : +2347033430969, +2348127052871
  
  */

  
    var validateType = function(data, type){
      var mailPattern = (/[a-zA-Z0-9\_\.\-]+(@)[a-zA-Z\-]+\.[a-zA-Z]{2,3}/g);
      var telPattern = (/^(\+?(234))?[0-9]{10,11}$/g);
      var numPattern = (/[^0-9]/g);
      switch(type){
        case "email":
        if (mailPattern.test(data)) {return true;}else{
          return false;
        }
        break;
        case "number":
          if(numPattern.test(data) || $.trim(data) == ""){return false;}else{return true;}
        break;
        case "tel":
        if(telPattern.test(data.replace(/\s+/g, ""))){return true;}else{return false;}
        break;
        case "checkbox":
        return data;
        break;
        case"text":
        var t = $.trim(data);
        if(t == "" || t == undefined || t == null){return false;}else{return true; }
        break;
        case"password":
        var t = $.trim(data);
        if(t == "" || t == undefined || t == null){return false;}else{return true; }
        break;

        case 'file':
          if(data != undefined)
            return true;
          return false;
        break;
        case "date":
        var d = new Date(data);
        console.log(d);
        console.log("data collected");
        var ts = Number(d.getTime());
        if(isNaN(ts))return false;
        return true;
        break;
        default:
        return true;
      }
    };

    var vRange = function(a, b, data, type, debug=false){
      var minR = true, maxR = true;
      data = (type == "number") ? Number(data) : data;
      
      if(a != null){
        if(type == "number" && !isNaN(data)){

          if(data < a){minR = false;}else{minR = true;}
        }else{
          if($.trim(data.length) < a){minR = false;}else{minR = true;}
        }
      }
      if(b != null){
        if(type == "number" && !isNaN(data)){
          if(data > b){maxR = false;}else{maxR = true;}
        }else{
          if($.trim(data.length) > b){maxR = false;}else{maxR = true;}
        }
      }
      
      if(!minR || !maxR){
        return false;
      }else{return true;}
    }

    $.prototype.matrixV = function(e){
      var errors = 0;
      data = $(e+" input, "+e+" select, "+e+" textarea");
      
      data.each(function(e, u){
        var req = $(this)[0].attributes["required"];
        var typ = $(this)[0].attributes["type"];
        var required = (req != undefined || req != null) ? req.value : false;
        var type = (typ != undefined || typ != null) ? typ.value : "null";
        var data = (type == "checkbox") ? $(this)[0].checked : $(this).val();
        var d1 = $(this)[0].attributes["data-min"];
        var d2 = $(this)[0].attributes["data-max"];

        var minRange = (d1 != undefined && d1 != null) ? Number(d1.value) : null;
        var maxRange = (d2 != undefined && d2 != null) ? Number(d2.value) : null;
        if(type == "date"){
          var data = (new Date(data)).getTime();
          var tsa = (d1 != undefined && d1 != null && d1.value != "") ? (new Date(d1.value)).getTime() : "";
          var tsb = (d2 != undefined && d2 != null && d2.value != "") ? (new Date(d2.value)).getTime() : "";
          minRange = (tsa != "") ? Number(tsa) : null;
          maxRange = (tsb != "") ? Number(tsb) : null;
        }
        minRange = (isNaN(minRange)) ? null: minRange;
        maxRange = (isNaN(maxRange)) ? null: maxRange;

        data = (type == "file") ? $(this)[0].files[0] : data;
        
        if(required){
          var db = false;
          if(type == "date"){
            type="number";
            //db = true;
          }

          var v1 = validateType(data, type);
          var v2 = vRange(minRange, maxRange, data, type, db);
          $(this).removeClass("red");
          if(!v1 || !v2){
            errors++;
            $(this).addClass("red");
          }
        }
      });
      if (errors > 0)return false;
      return true;
    }

    $("*[data-count]").keyup(function(){
      $($(this).attr("data-count")).html($(this).val().length);
    });