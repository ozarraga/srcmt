/*<![CDATA[*///function fetchData(url,dataRequested,objectID){//    if (dataRequested) var dataRequest = "dataRequest="+ dataRequested;//    var pageRequest = false//    if (window.XMLHttpRequest) {//        pageRequest = new XMLHttpRequest()//    }//    else if (window.ActiveXObject){//        try {//            pageRequest = new ActiveXObject("Msxml2.XMLHTTP")//        }//        catch (e) {//            try{//                pageRequest = new ActiveXObject("Microsoft.XMLHTTP")//            }//            catch (e){}//        }//    }//    else return false//    pageRequest.onreadystatechange=function() {//        filterData(pageRequest,objectID)//    }//    if (dataRequested) {//        pageRequest.open('POST', url, true);//        pageRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');//        pageRequest.send(dataRequest);//    }//    else {//        pageRequest.open('GET', url, true);//        pageRequest.send(null)//    }//}////function clearField(obj) {//    if (obj.defaultValue==obj.value) obj.value = '';//}//function getParroquiaYciudad(url1,url2,requestedData,object1,object2,object3) {//////    var comboEstado=document.getElementById(object3);//////    var peticion=new Array();////    peticion[0]="dataRequest[codigo_municipio]="+requestedData;//    peticion[1]="dataRequest[codigo_estado]="+ comboEstado.selectedIndex;////    requestedData=peticion;////    eligeDPT(url1,requestedData,object1);//////    eligeDPT(url2,requestedData,object2);//}////////function eligeDPT(url,requestedData,objectID) {//    fetchData(url,requestedData,objectID);////    _Ajax(url,requestedData, objectID);//}////////function filterData(pageRequest,objectID){//    var object = document.getElementById(objectID);////    if (pageRequest.readyState == 4 && (pageRequest.status==200 || window.location.href.indexOf("http")==-1)) {//        var object = document.getElementById(objectID);//        object.options.length = 0;//        if(pageRequest.responseText != '') {////            var arrSecondaryData = JSON.parse(pageRequest.responseText);////            for  (i in arrSecondaryData){//                nodo=arrSecondaryData[i];//                object.options[object.options.length] = new Option(nodo[1], nodo[0]);//            }//        }//    }//}            /*]]>*/