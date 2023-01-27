
<table>
    <tbody>
        <tr>
            <td width="10%" nowrap="">
                Issues
                <input name="issues" value="issues">
            </td>
        <td width="1%">:</td>
        <td>
        
                
                <input type="text" name="txtValue" value="">
        
        </td>
    </tr>			

    <tr>
        <td width="1%" nowrap="">&nbsp;</td>
        <td width="10%" nowrap="">
            Target Quarter
            <input type="hidden" name="txtSearchDesc" value="Target Quarter">
            <input type="hidden" name="txtSearchFieldType" value="C">
            <input type="hidden" name="txtSearchMondatory" value="N">
        </td>
        <td width="1%">:</td>
        <td>
        
                <select name="txtValue">
                    <option></option>
                    <option value="First">First</option><option value="Second">Second</option><option value="Third">Third</option><option value="Fourth">Fourth</option>
                </select>
            
        
        </td>
    </tr>			

    <tr>
        <td width="1%" nowrap="">&nbsp;</td>
        <td width="10%" nowrap="">
            Target Month
            <input type="hidden" name="txtSearchDesc" value="Target Month">
            <input type="hidden" name="txtSearchFieldType" value="C">
            <input type="hidden" name="txtSearchMondatory" value="N">
        </td>
        <td width="1%">:</td>
        <td>
        
                <select name="txtValue">
                    <option></option>
                    <option value="January">January</option><option value="February">February</option><option value="March">March</option><option value="April">April</option><option value="May">May</option><option value="June">June</option><option value="July">July</option><option value="August">August</option><option value="September">September</option><option value="October">October</option><option value="November">November</option><option value="December">December</option>
                </select>
            
        
        </td>
    </tr>			

    <tr>
        <td width="1%" nowrap="">&nbsp;</td>
        <td width="10%" nowrap="">
            Target Year
            <input type="hidden" name="txtSearchDesc" value="Target Year">
            <input type="hidden" name="txtSearchFieldType" value="I">
            <input type="hidden" name="txtSearchMondatory" value="N">
        </td>
        <td width="1%">:</td>
        <td>
        
                
                <input type="text" name="txtValue" value="" onkeypress="return ValidateKeyPress(event, 3);" onblur="return ChkNumeric(this, this, 'Target Year');">
        
        </td>
    </tr>			

    <tr>
        <td width="1%" nowrap="">&nbsp;</td>
        <td width="10%" nowrap="">
            Issue Date
            <input type="hidden" name="txtSearchDesc" value="Issue Date">
            <input type="hidden" name="txtSearchFieldType" value="D">
            <input type="hidden" name="txtSearchMondatory" value="N">
        </td>
        <td width="1%">:</td>
        <td>
        
                
                <input type="text" name="txtValue" value="" onkeypress="return ValidateKeyPress(event, 8);" onblur="ChkDateFormat(this, this, 'Issue Date');">
        
        </td>
    </tr>			

    <tr>
        <td width="1%" nowrap="">&nbsp;</td>
        <td width="10%" nowrap="">
            Amount (RM Million)
            <input type="hidden" name="txtSearchDesc" value="Amount (RM Million)">
            <input type="hidden" name="txtSearchFieldType" value="N">
            <input type="hidden" name="txtSearchMondatory" value="N">
        </td>
        <td width="1%">:</td>
        <td>
        
                
                <input type="text" name="txtValue" value="" onkeypress="return ValidateKeyPress(event, 21);" onblur="return FmtCurrency(this, 20, 2, 'TRUE', 0, null, '');">
        
        </td>
    </tr>			
    
</tbody></table>
<hr>
<table width="100%" height="25px" cellspacing="0" cellpadding="0" border="0" align="center">
    <tbody><tr>
    <td width="15%" align="center"><a style="cursor:pointer;" onclick="SearchFn();" id="btnSearch"><img src="/fastweb/images/buttons/btnSearch.gif"></a></td>
    
    <td width="15%" align="center"><a style="cursor:pointer;" onclick="CloseFn();" id="btnClose"><img src="/fastweb/images/buttons/btnClose.gif"></a></td>
    
    </tr>
</tbody></table>

