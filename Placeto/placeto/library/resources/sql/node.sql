SELECT n.ID, n.ModuleID, n.PrimaryKey, n.ParentID,
		n.Address, n.RedirectURL,
		m.Module, m.Table
	FROM tblNodes AS n
	JOIN tblModules AS m
		ON m.ID=n.ModuleID
	WHERE n.Address=:Address
		AND m.Enabled='true'
		AND m.Type='Node'
	LIMIT 1
;