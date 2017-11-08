function showHelpTab(helpTopic,elmnt) {
    var i, tabcontent, helpTabs;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    helpTabs = document.getElementsByClassName("helpTabs");
    for (i = 0; i < helpTabs.length; i++) {
        helpTabs[i].style.backgroundColor = "";
    }
    document.getElementById(helpTopic).style.display = "block";

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
