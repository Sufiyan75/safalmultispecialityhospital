<!-- Begin Main Menu -->
<div class="ewMenu">
<?php $RootMenu = new crMenu(EWR_MENUBAR_ID); ?>
<?php

// Generate all menu items
$RootMenu->IsRoot = TRUE;
$RootMenu->AddMenuItem(2, "mi_patient_gender", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("2", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "patient_genderrpt.php", -1, "", TRUE, FALSE);
$RootMenu->AddMenuItem(3, "mi_patient_city", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("3", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "patient_cityrpt.php", -1, "", TRUE, FALSE);
$RootMenu->AddMenuItem(5, "mi_patient_log_status", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("5", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "patient_log_statusrpt.php", -1, "", TRUE, FALSE);
$RootMenu->AddMenuItem(7, "mi_doctor_gender", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("7", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "doctor_genderrpt.php", -1, "", TRUE, FALSE);
$RootMenu->AddMenuItem(8, "mi_doctor_city", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("8", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "doctor_cityrpt.php", -1, "", TRUE, FALSE);
$RootMenu->AddMenuItem(9, "mi_doctor_spec", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("9", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "doctor_specrpt.php", -1, "", TRUE, FALSE);
$RootMenu->AddMenuItem(10, "mi_doctor_created", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("10", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "doctor_createdrpt.php", -1, "", TRUE, FALSE);
$RootMenu->AddMenuItem(12, "mi_doctor_log_status", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("12", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "doctor_log_statusrpt.php", -1, "", TRUE, FALSE);
$RootMenu->AddMenuItem(14, "mi_app_count", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("14", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "app_countrpt.php", -1, "", TRUE, FALSE);
$RootMenu->AddMenuItem(15, "mi_app_patient_cnt", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("15", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "app_patient_cntrpt.php", -1, "", TRUE, FALSE);
$RootMenu->AddMenuItem(16, "mi_app_spec", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("16", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "app_specrpt.php", -1, "", TRUE, FALSE);
$RootMenu->AddMenuItem(17, "mi_app_bet_dates", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("17", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "app_bet_datesrpt.php", -1, "", TRUE, FALSE);
$RootMenu->AddMenuItem(18, "mi_app_time", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("18", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "app_timerpt.php", -1, "", TRUE, FALSE);
$RootMenu->AddMenuItem(20, "mi_onl_pat_medical_his", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("20", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "onl_pat_medical_hisrpt.php", -1, "", TRUE, FALSE);
$RootMenu->Render();
?>
</div>
<!-- End Main Menu -->
