SELECT k.Keyword
	FROM tblNodesKeywords AS nk
	JOIN tblKeywords AS k
		ON k.ID=nk.KeywordID
	WHERE nk.NodeID=:NodeID
	GROUP BY k.Keyword
	ORDER BY nk.Position, nk.KeywordID
;