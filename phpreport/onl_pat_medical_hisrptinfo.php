<?php

// Global variable for table object
$onl_pat_medical_his = NULL;

//
// Table class for onl_pat_medical_his
//
class cronl_pat_medical_his extends crTableBase {
	var $ShowGroupHeaderAsRow = FALSE;
	var $ShowCompactSummaryFooter = TRUE;
	var $Medical_id;
	var $username;
	var $doc_username;
	var $BloodPressure;
	var $BloodSugar;
	var $Weight;
	var $Temperature;
	var $MedicalPres;
	var $CreationDate;

	//
	// Table class constructor
	//
	function __construct() {
		global $ReportLanguage, $gsLanguage;
		$this->TableVar = 'onl_pat_medical_his';
		$this->TableName = 'onl_pat_medical_his';
		$this->TableType = 'VIEW';
		$this->DBID = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0;

		// Medical_id
		$this->Medical_id = new crField('onl_pat_medical_his', 'onl_pat_medical_his', 'x_Medical_id', 'Medical_id', '`Medical_id`', 3, EWR_DATATYPE_NUMBER, -1);
		$this->Medical_id->Sortable = TRUE; // Allow sort
		$this->Medical_id->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectInteger");
		$this->fields['Medical_id'] = &$this->Medical_id;
		$this->Medical_id->DateFilter = "";
		$this->Medical_id->SqlSelect = "";
		$this->Medical_id->SqlOrderBy = "";

		// username
		$this->username = new crField('onl_pat_medical_his', 'onl_pat_medical_his', 'x_username', 'username', '`username`', 200, EWR_DATATYPE_STRING, -1);
		$this->username->Sortable = TRUE; // Allow sort
		$this->fields['username'] = &$this->username;
		$this->username->DateFilter = "";
		$this->username->SqlSelect = "";
		$this->username->SqlOrderBy = "";

		// doc_username
		$this->doc_username = new crField('onl_pat_medical_his', 'onl_pat_medical_his', 'x_doc_username', 'doc_username', '`doc_username`', 200, EWR_DATATYPE_STRING, -1);
		$this->doc_username->Sortable = TRUE; // Allow sort
		$this->fields['doc_username'] = &$this->doc_username;
		$this->doc_username->DateFilter = "";
		$this->doc_username->SqlSelect = "";
		$this->doc_username->SqlOrderBy = "";

		// BloodPressure
		$this->BloodPressure = new crField('onl_pat_medical_his', 'onl_pat_medical_his', 'x_BloodPressure', 'BloodPressure', '`BloodPressure`', 200, EWR_DATATYPE_STRING, -1);
		$this->BloodPressure->Sortable = TRUE; // Allow sort
		$this->fields['BloodPressure'] = &$this->BloodPressure;
		$this->BloodPressure->DateFilter = "";
		$this->BloodPressure->SqlSelect = "";
		$this->BloodPressure->SqlOrderBy = "";

		// BloodSugar
		$this->BloodSugar = new crField('onl_pat_medical_his', 'onl_pat_medical_his', 'x_BloodSugar', 'BloodSugar', '`BloodSugar`', 200, EWR_DATATYPE_STRING, -1);
		$this->BloodSugar->Sortable = TRUE; // Allow sort
		$this->fields['BloodSugar'] = &$this->BloodSugar;
		$this->BloodSugar->DateFilter = "";
		$this->BloodSugar->SqlSelect = "";
		$this->BloodSugar->SqlOrderBy = "";

		// Weight
		$this->Weight = new crField('onl_pat_medical_his', 'onl_pat_medical_his', 'x_Weight', 'Weight', '`Weight`', 3, EWR_DATATYPE_NUMBER, -1);
		$this->Weight->Sortable = TRUE; // Allow sort
		$this->Weight->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectInteger");
		$this->fields['Weight'] = &$this->Weight;
		$this->Weight->DateFilter = "";
		$this->Weight->SqlSelect = "";
		$this->Weight->SqlOrderBy = "";

		// Temperature
		$this->Temperature = new crField('onl_pat_medical_his', 'onl_pat_medical_his', 'x_Temperature', 'Temperature', '`Temperature`', 3, EWR_DATATYPE_NUMBER, -1);
		$this->Temperature->Sortable = TRUE; // Allow sort
		$this->Temperature->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectInteger");
		$this->fields['Temperature'] = &$this->Temperature;
		$this->Temperature->DateFilter = "";
		$this->Temperature->SqlSelect = "";
		$this->Temperature->SqlOrderBy = "";

		// MedicalPres
		$this->MedicalPres = new crField('onl_pat_medical_his', 'onl_pat_medical_his', 'x_MedicalPres', 'MedicalPres', '`MedicalPres`', 201, EWR_DATATYPE_MEMO, -1);
		$this->MedicalPres->Sortable = TRUE; // Allow sort
		$this->fields['MedicalPres'] = &$this->MedicalPres;
		$this->MedicalPres->DateFilter = "";
		$this->MedicalPres->SqlSelect = "";
		$this->MedicalPres->SqlOrderBy = "";

		// CreationDate
		$this->CreationDate = new crField('onl_pat_medical_his', 'onl_pat_medical_his', 'x_CreationDate', 'CreationDate', '`CreationDate`', 135, EWR_DATATYPE_DATE, 0);
		$this->CreationDate->Sortable = TRUE; // Allow sort
		$this->CreationDate->FldDefaultErrMsg = str_replace("%s", $GLOBALS["EWR_DATE_FORMAT"], $ReportLanguage->Phrase("IncorrectDate"));
		$this->fields['CreationDate'] = &$this->CreationDate;
		$this->CreationDate->DateFilter = "";
		$this->CreationDate->SqlSelect = "";
		$this->CreationDate->SqlOrderBy = "";
	}

	// Set Field Visibility
	function SetFieldVisibility($fldparm) {
		global $Security;
		return $this->$fldparm->Visible; // Returns original value
	}

	// Multiple column sort
	function UpdateSort(&$ofld, $ctrl) {
		if ($this->CurrentOrder == $ofld->FldName) {
			$sSortField = $ofld->FldExpression;
			$sLastSort = $ofld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$sThisSort = $this->CurrentOrderType;
			} else {
				$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			}
			$ofld->setSort($sThisSort);
			if ($ofld->GroupingFieldId == 0) {
				if ($ctrl) {
					$sOrderBy = $this->getDetailOrderBy();
					if (strpos($sOrderBy, $sSortField . " " . $sLastSort) !== FALSE) {
						$sOrderBy = str_replace($sSortField . " " . $sLastSort, $sSortField . " " . $sThisSort, $sOrderBy);
					} else {
						if ($sOrderBy <> "") $sOrderBy .= ", ";
						$sOrderBy .= $sSortField . " " . $sThisSort;
					}
					$this->setDetailOrderBy($sOrderBy); // Save to Session
				} else {
					$this->setDetailOrderBy($sSortField . " " . $sThisSort); // Save to Session
				}
			}
		} else {
			if ($ofld->GroupingFieldId == 0 && !$ctrl) $ofld->setSort("");
		}
	}

	// Get Sort SQL
	function SortSql() {
		$sDtlSortSql = $this->getDetailOrderBy(); // Get ORDER BY for detail fields from session
		$argrps = array();
		foreach ($this->fields as $fld) {
			if ($fld->getSort() <> "") {
				$fldsql = $fld->FldExpression;
				if ($fld->GroupingFieldId > 0) {
					if ($fld->FldGroupSql <> "")
						$argrps[$fld->GroupingFieldId] = str_replace("%s", $fldsql, $fld->FldGroupSql) . " " . $fld->getSort();
					else
						$argrps[$fld->GroupingFieldId] = $fldsql . " " . $fld->getSort();
				}
			}
		}
		$sSortSql = "";
		foreach ($argrps as $grp) {
			if ($sSortSql <> "") $sSortSql .= ", ";
			$sSortSql .= $grp;
		}
		if ($sDtlSortSql <> "") {
			if ($sSortSql <> "") $sSortSql .= ", ";
			$sSortSql .= $sDtlSortSql;
		}
		return $sSortSql;
	}

	// Table level SQL
	// From

	var $_SqlFrom = "";

	function getSqlFrom() {
		return ($this->_SqlFrom <> "") ? $this->_SqlFrom : "`onl_pat_medical_his`";
	}

	function SqlFrom() { // For backward compatibility
		return $this->getSqlFrom();
	}

	function setSqlFrom($v) {
		$this->_SqlFrom = $v;
	}

	// Select
	var $_SqlSelect = "";

	function getSqlSelect() {
		return ($this->_SqlSelect <> "") ? $this->_SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}

	function SqlSelect() { // For backward compatibility
		return $this->getSqlSelect();
	}

	function setSqlSelect($v) {
		$this->_SqlSelect = $v;
	}

	// Where
	var $_SqlWhere = "";

	function getSqlWhere() {
		$sWhere = ($this->_SqlWhere <> "") ? $this->_SqlWhere : "";
		return $sWhere;
	}

	function SqlWhere() { // For backward compatibility
		return $this->getSqlWhere();
	}

	function setSqlWhere($v) {
		$this->_SqlWhere = $v;
	}

	// Group By
	var $_SqlGroupBy = "";

	function getSqlGroupBy() {
		return ($this->_SqlGroupBy <> "") ? $this->_SqlGroupBy : "";
	}

	function SqlGroupBy() { // For backward compatibility
		return $this->getSqlGroupBy();
	}

	function setSqlGroupBy($v) {
		$this->_SqlGroupBy = $v;
	}

	// Having
	var $_SqlHaving = "";

	function getSqlHaving() {
		return ($this->_SqlHaving <> "") ? $this->_SqlHaving : "";
	}

	function SqlHaving() { // For backward compatibility
		return $this->getSqlHaving();
	}

	function setSqlHaving($v) {
		$this->_SqlHaving = $v;
	}

	// Order By
	var $_SqlOrderBy = "";

	function getSqlOrderBy() {
		return ($this->_SqlOrderBy <> "") ? $this->_SqlOrderBy : "";
	}

	function SqlOrderBy() { // For backward compatibility
		return $this->getSqlOrderBy();
	}

	function setSqlOrderBy($v) {
		$this->_SqlOrderBy = $v;
	}

	// Select Aggregate
	var $_SqlSelectAgg = "";

	function getSqlSelectAgg() {
		return ($this->_SqlSelectAgg <> "") ? $this->_SqlSelectAgg : "SELECT * FROM " . $this->getSqlFrom();
	}

	function SqlSelectAgg() { // For backward compatibility
		return $this->getSqlSelectAgg();
	}

	function setSqlSelectAgg($v) {
		$this->_SqlSelectAgg = $v;
	}

	// Aggregate Prefix
	var $_SqlAggPfx = "";

	function getSqlAggPfx() {
		return ($this->_SqlAggPfx <> "") ? $this->_SqlAggPfx : "";
	}

	function SqlAggPfx() { // For backward compatibility
		return $this->getSqlAggPfx();
	}

	function setSqlAggPfx($v) {
		$this->_SqlAggPfx = $v;
	}

	// Aggregate Suffix
	var $_SqlAggSfx = "";

	function getSqlAggSfx() {
		return ($this->_SqlAggSfx <> "") ? $this->_SqlAggSfx : "";
	}

	function SqlAggSfx() { // For backward compatibility
		return $this->getSqlAggSfx();
	}

	function setSqlAggSfx($v) {
		$this->_SqlAggSfx = $v;
	}

	// Select Count
	var $_SqlSelectCount = "";

	function getSqlSelectCount() {
		return ($this->_SqlSelectCount <> "") ? $this->_SqlSelectCount : "SELECT COUNT(*) FROM " . $this->getSqlFrom();
	}

	function SqlSelectCount() { // For backward compatibility
		return $this->getSqlSelectCount();
	}

	function setSqlSelectCount($v) {
		$this->_SqlSelectCount = $v;
	}

	// Sort URL
	function SortUrl(&$fld) {
		if ($this->Export <> "" ||
			in_array($fld->FldType, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {

			//$sUrlParm = "order=" . urlencode($fld->FldName) . "&ordertype=" . $fld->ReverseSort();
			$sUrlParm = "order=" . urlencode($fld->FldName) . "&amp;ordertype=" . $fld->ReverseSort();
			return ewr_CurrentPage() . "?" . $sUrlParm;
		} else {
			return "";
		}
	}

	// Setup lookup filters of a field
	function SetupLookupFilters($fld) {
		global $gsLanguage;
		switch ($fld->FldVar) {
		}
	}

	// Setup AutoSuggest filters of a field
	function SetupAutoSuggestFilters($fld) {
		global $gsLanguage;
		switch ($fld->FldVar) {
		}
	}

	// Table level events
	// Page Selecting event
	function Page_Selecting(&$filter) {

		// Enter your code here
	}

	// Page Breaking event
	function Page_Breaking(&$break, &$content) {

		// Example:
		//$break = FALSE; // Skip page break, or
		//$content = "<div style=\"page-break-after:always;\">&nbsp;</div>"; // Modify page break content

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Cell Rendered event
	function Cell_Rendered(&$Field, $CurrentValue, &$ViewValue, &$ViewAttrs, &$CellAttrs, &$HrefValue, &$LinkAttrs) {

		//$ViewValue = "xxx";
		//$ViewAttrs["style"] = "xxx";

	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}

	// Load Filters event
	function Page_FilterLoad() {

		// Enter your code here
		// Example: Register/Unregister Custom Extended Filter
		//ewr_RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A', 'GetStartsWithAFilter'); // With function, or
		//ewr_RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A'); // No function, use Page_Filtering event
		//ewr_UnregisterFilter($this-><Field>, 'StartsWithA');

	}

	// Page Filter Validated event
	function Page_FilterValidated() {

		// Example:
		//$this->MyField1->SearchValue = "your search criteria"; // Search value

	}

	// Page Filtering event
	function Page_Filtering(&$fld, &$filter, $typ, $opr = "", $val = "", $cond = "", $opr2 = "", $val2 = "") {

		// Note: ALWAYS CHECK THE FILTER TYPE ($typ)! Example:
		//if ($typ == "dropdown" && $fld->FldName == "MyField") // Dropdown filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "extended" && $fld->FldName == "MyField") // Extended filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "popup" && $fld->FldName == "MyField") // Popup filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "custom" && $opr == "..." && $fld->FldName == "MyField") // Custom filter, $opr is the custom filter ID
		//	$filter = "..."; // Modify the filter

	}

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		// Enter your code here
	}
}
?>
