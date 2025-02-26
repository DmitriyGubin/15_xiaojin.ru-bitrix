<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/local/modules/zamit.sitemap/classes/general/sitemap.php");

class CSiteMapG extends CAllSiteMapG
{
    public function GetURLs($site_id, $ID, $limit=0)
    {
        $DB = CDatabase::GetModuleConnection('search');
        $strSql="
		SELECT
			sc.ID
			,sc.MODULE_ID
			,sc.ITEM_ID
			,L.LID
			,sc.TITLE
			,sc.PARAM1
			,sc.PARAM2
			,sc.UPD
			,sc.DATE_FROM
			,sc.DATE_TO
			,L.DIR
			,L.SERVER_NAME
			,sc.URL as URL
			,scsite.URL as SITE_URL
			,scsite.SITE_ID
			,".$DB->DateToCharFunction("sc.DATE_CHANGE")." as FULL_DATE_CHANGE
			,".$DB->DateToCharFunction("sc.DATE_CHANGE", "SHORT")." as DATE_CHANGE
		FROM	b_search_content sc
			INNER JOIN b_search_content_site scsite ON sc.ID=scsite.SEARCH_CONTENT_ID
			INNER JOIN b_lang L ON scsite.SITE_ID=L.LID
			INNER JOIN b_search_content_right scg ON sc.ID=scg.SEARCH_CONTENT_ID
		WHERE
			scg.GROUP_CODE='G2'
			AND scsite.SITE_ID='".$DB->ForSQL($site_id, 2)."'
			AND sc.ID > ".intval($ID)."
		ORDER BY
			sc.ID
		";
        if (intval($limit)>0) {
            $strSql .= "LIMIT ".intval($limit);
        }
        $r = $DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);
        parent::__construct($r->result);
    }
}
