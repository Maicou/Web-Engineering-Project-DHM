<form action="http://yourserver/register.php" method="post">
<table border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td align="right">Anrede:</td>
      <td>
        <select name="gender">
          <option value="default">Bitte wählen</option>
          <option value="male">Herr</option>
          <option value="fimale">Frau</option>
        </select>
      </td>
    </tr>
    <tr>
      <td align="right">Vorname:</td>
      <td>
        <input maxlength="50" name="Vorname" size="45" type="text" />
      </td>
    </tr>
    <tr>
      <td align="right">Nachname:</td>
      <td>
        <input maxlength="50" name="Nachname" size="45" type="text" />
      </td>
    </tr>
    <tr>
      <td align="right">Adresse:</td>
      <td>
        <input maxlength="50" name="Adresse" size="45" type="text" />
      </td>
    </tr>
    <tr>
    <td align="right">Miete (kalt):</td>
    <td>
      <input maxlength="5" name="PLZ" size="7" type="text" />
    </td>
    </tr>
    <tr>
      <td align="right">Nebenkosten:</td>
      <td>
        <input maxlength="50" name="Ort" size="45" type="text" />
      </td>
    </tr>
    <tr>
      <td align="right">Email:</td>
      <td>
        <input maxlength="80" name="Email" size="45" type="text" />
      </td>
    </tr>
    </tr>
    <tr>
      <td align="right">Telefon:</td>
      <td>
        <input maxlength="15" name="Email" size="20" type="text" />
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input type="submit" value="Speichern" class="actionbutton"/>
      </td>
    </tr>
  </tbody>
</table>
</form>