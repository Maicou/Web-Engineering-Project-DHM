<form action="../public/HouseOverviews/createTenantHouse1" method="post">
<table border="0" cellspacing="2" cellpadding="2">
  <tbody>
<!--    <tr>
      <td align="right">Anrede:</td>
      <td>
        <select name="gender">
          <option value="default">Bitte wählen</option>
          <option value="male">Herr</option>
          <option value="fimale">Frau</option>
        </select>
      </td>-->
    </tr>
    <tr>
      <td align="right">Vorname:</td>
      <td>
        <input maxlength="50" name="forename" size="45" type="text" />
      </td>
    </tr>
    <tr>
      <td align="right">Nachname:</td>
      <td>
        <input maxlength="50" name="name" size="45" type="text" />
      </td>
    </tr>
    <tr>
      <td align="right">Strasse:</td>
      <td>
        <input maxlength="50" name="street" size="45" type="text" />
      </td>
    </tr>
    <tr>
      <td align="right">Ort:</td>
      <td>
        <input maxlength="50" name="city" size="45" type="text" />
      </td>
    </tr>
    <tr>
      <td align="right">PLZ:</td>
      <td>
          <input maxlength="50" name="postalcode" size="45" type="text" />
      </td>
    </tr>
    <tr>
      <td align="right">Vertragsbeginn(T,M,J):</td>
      <td>
          <input maxlength="50" name="contract_start" size="45" type="date" />
      </td>
    </tr>
    <tr>
      <td align="right">Vertragsende(T,M,J):</td>
      <td>
          <input maxlength="50" name="contract_end" size="45" type="date" />
      </td>
    </tr>
    <tr>
    <td align="right">Vertragsbeschreibung:</td>
    <td>
      <input maxlength="80" name="contract_description" size="45" type="text" />
    </td>
    </tr>
   
        <tr>
      <td align="right">Wohnungsnummer/Büronummer:</td>
      <td>
        <select name="roomnumber">
          <option value="1">Büro 1</option>
          <option value="2">Büro 2</option>
          <option value="3">Büro 3</option>
          <option value="4">Büro 4</option>
          <option value="5">Wohnung 1</option>
          <option value="6">Wohnung 2</option>
          <option value="7">Wohnung 3</option>
          <option value="8">Wohnung 4</option>
        </select>
      </td>
        </tr>
        
      <tr>
      <td align="right">Mieteinnahme:</td>
      <td>
          <input maxlength="50" name="rentalIncome" size="45" type="number" />
      </td>
    </tr>
    <tr>
    <td align="right">Nebenkosten:</td>
      <td>
          <input maxlength="50" name="excludingIncome" size="45" type="number" />
      </td>
    </tr>
    <tr>
    <td align="right">Kaution:</td>
      <td>
          <input maxlength="50" name="bond" size="45" type="number" />
      </td>
    </tr>
      <td></td>
      <td>
        <input type="submit" value="Speichern" class="actionbutton"/>
      </td>
    </tr>
  </tbody>
</table>
</form>