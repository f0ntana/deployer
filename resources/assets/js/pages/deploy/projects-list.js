$(document).ready(function () {

    if ($('#project-list').is(':visible')) {
        $('#project-list').load('/deploy/projectslist');
    }

});