<?php
function renderAttribute($attribute, $multiple = false, $suffix = "", $data = null)
{
	switch($attribute->AttributeTypeID)
	{
		case 1: // Checkbox
			renderCheckField($attribute, $multiple, $suffix, $data);
			break;
		case 2: // Textfält
			renderTextField($attribute, $multiple, $suffix, $data);
			break;
		case 3: // Nummerfält
			renderNumberField($attribute, $multiple, $suffix, $data);
			break;
		case 4: // Flervärdesfält
			//renderTextField($attribute, $multiple, $suffix, $data);
			break;
		case 5: // Dropdownlista
			renderSelectField($attribute, $multiple, $suffix, $data);
			break;
		case 6: // Anteckningsfält
			renderTextAreaField($attribute, $multiple, $suffix, $data);
			break;
		case 7: // Datumfält
			//renderDateField($attribute, $multiple, $suffix, $data);
			break;
		case 8: // HTML
			//renderTextAreaField($attribute, $multiple, $suffix, $data);
			break;
		case 9: // Checkboxlista
			//renderCheckboxListField($attribute, $multiple, $suffix, $data);
			break;
		case 10: // Pinkod
			break;
		default:
			renderDebugAttributeInfo($attribute);
			break;
	}
}

function renderCheckField($attribute, $multiple, $suffix, $data)
{
	echo "<label><div class=\"inputLabel\">";
	echo $attribute->AttributeDescription;
	echo "</div><div class=\"inputHolder\">";
	echo "<input type=\"checkbox\"" . ($data != null && $data ? " checked=\"checked\"" : "") . " name=\"edu-attr_" . $attribute->AttributeID . ($suffix != "" ? "-" . $suffix : "") . ($multiple ? "[]" : "") . "\" />";
	echo "</div></label>";
}

function renderTextField($attribute, $multiple, $suffix, $data)
{
	echo "<label><div class=\"inputLabel\">";
	echo $attribute->AttributeDescription;
	echo "</div><div class=\"inputHolder\">";
	echo "<input type=\"text\" name=\"edu-attr_" . $attribute->AttributeID . ($suffix != "" ? "-" . $suffix : "") . ($multiple ? "[]" : "") . "\" value=\"" . ($data != null ? $data : $attribute->AttributeValue) . "\" />";
	echo "</div></label>";
}

function renderNumberField($attribute, $multiple, $suffix, $data)
{
	echo "<label><div class=\"inputLabel\">";
	echo $attribute->AttributeDescription;
	echo "</div><div class=\"inputHolder\">";
	echo "<input type=\"number\" name=\"edu-attr_" . $attribute->AttributeID . ($suffix != "" ? "-" . $suffix : "") . ($multiple ? "[]" : "") . "\" value=\"" . ($data != null ? $data : $attribute->AttributeValue) . "\" />";
	echo "</div></label>";
}

function renderDateField($attribute, $multiple, $suffix, $data)
{
	echo "<label><div class=\"inputLabel\">";
	echo $attribute->AttributeDescription;
	echo "</div><div class=\"inputHolder\">";
	echo "<input type=\"date\" name=\"edu-attr_" . $attribute->AttributeID . ($suffix != "" ? "-" . $suffix : "") . ($multiple ? "[]" : "") . "\" />";
	echo "</div></label>";
}

function renderTextAreaField($attribute, $multiple, $suffix, $data)
{
	echo "<label><div class=\"inputLabel\">";
	echo $attribute->AttributeDescription;
	echo "</div><div class=\"inputHolder\">";
	echo "<textarea name=\"edu-attr_" . $attribute->AttributeID . ($suffix != "" ? "-" . $suffix : "") . ($multiple ? "[]" : "") . "\" rows=\"3\" resizable=\"resizable\">" . ($data != null ? $data : $attribute->AttributeValue) . "</textarea>";
	echo "</div></label>";
}

function renderSelectField($attribute, $multiple, $suffix, $data)
{
	echo "<label><div class=\"inputLabel\">";
	echo $attribute->AttributeDescription;
	echo "</div><div class=\"inputHolder\">";
	echo "<select name=\"edu-attr_" . $attribute->AttributeID . ($suffix != "" ? "-" . $suffix : "") . ($multiple ? "[]" : "") . "\">\n";
	foreach($attribute->AttributeAlternative as $val)
	{
		echo "\t<option" . ($data != null && $data == $val->AttributeAlternativeID ? " selected=\"selected\"" : "") . " value=\"" . $val->AttributeAlternativeID . "\">" . $val->AttributeAlternativeDescription . "</option>\n";
	}
	echo "</select>";
	echo "</div></label>";
}

function renderCheckboxListField($attribute, $multiple, $suffix, $data)
{
	echo "<div class=\"inputLabel\">";
	echo $attribute->AttributeDescription;
	echo "</div><div class=\"inputHolder\">";
	foreach($attribute->AttributeAlternative as $val)
	{
		echo "\t<label><input" . ($data != null && $data == $val->AttributeAlternativeID ? " checked=\"checked\"" : "") . " type=\"checkbox\" name=\"edu-attr_" . $attribute->AttributeID . ($suffix != "" ? "-" . $suffix : "") . ($multiple ? "[]" : "") . "\" value=\"" . $val->AttributeAlternativeID . "\">" . $val->AttributeAlternativeDescription . "</label>\n";
	}
	echo "</div>";
}

function renderDebugAttributeInfo($attribute)
{
	echo "<label><div class=\"inputLabel\">";
	echo $attribute->AttributeDescription;
	echo "</div><div class=\"inputHolder\">";
	echo "<pre>" . print_r($attribute, true) . "</pre>";
	echo "</div></label>";
}