var caste=new Array();caste["Hindu"]=["96K Kokanastha","Agri","Arya Vysya","Aryasamaj","Bhandari","Bhavsar Kshatriya","Brahmin","Brahmin- Daivadnya","Brahmin- Desastha","Brahmin- Karhade","Brahmin- Kokanstha","Brahmin- Rigvedi","Brahmin- Saraswat","Brahmin Yajurvedi","Brahmin Tyagi","Chambhar","CKP","Devang Koshti","Dhangar","Devanga","Dhobi","Gabit","Gomantak Maratha","Gosavi","Gowda","Gurjar","Jangam","Kasar","Kayastha","Koli","Koli-Mahadeo","Kshtriya","Kumbhar","Kunbi","Kashyap","Khatri","Koshti","Kumawat","Kurmi","Leva Patil","Lingayat","Lohar","Maithil Brahmin","Mali","Maratha","Matang","Nhavi","Desai","Shahu","Sonar","Sowrashtra","Sutar","Swarnakar","Teli","Thevar","Vaishnav","Vaishya Wani","Vanjari","Vyasa","Vishwakarma","Yadav","Banjara","Barai","Bari","Gawali","Ghisadi","Gurav","Otari","Savji","Rajput","Dhor","Shimpi","Shimpi Namdeo","Sali","Sali-Swakul","Wani","Bhavsar","Gowari","Marwari","Kasar Tambat","Vadar","Beldar","NathJogi","Mahar","Gondhali","Dhali","Sarode","Bhoi","Halba","Lonari","Golla","Thakur","Halba","Others","Caste No Bar"];caste["Buddhist"]=["Others","Caste No Bar"];function get_caste(obj,show_default){var sel_caste='';var sel_religion=obj.options[obj.selectedIndex].text;var caste_obj=obj.form.elements["caste"];while(caste_obj.options.length)caste_obj.options[0]=null;caste_obj.options[0]=new Option("Any","Any",true);caste[sel_religion].sort();for(j=0;j<caste[sel_religion].length;j++){if(caste[sel_religion][j]!=""){var caste_val=caste[sel_religion][j]=="Any"?"Any":caste[sel_religion][j];var def_sel=(sel_caste==caste_val)?true:false;caste_obj.options[j+1]=new Option(caste[sel_religion][j],caste_val,true,def_sel);}}}