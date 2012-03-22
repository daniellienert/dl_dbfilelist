plugin.tx_ptextlist.settings.listConfig.dlDbList_downloads {

	backendConfig < plugin.tx_ptextlist.prototype.backend.typo3
	backendConfig {

		datasource {
		}

		tables (
			tx_dldropboxsync_domain_model_filemeta filemeta
		)

		// baseFromClause ()

		// baseWhereClause ()
	}

	fields {
		fileName {
			table = filemeta
			field = local_path
		}

		modified {
			table = filemeta
			field = modified
		}

		downloads {
			table = filemeta
			field = downloads
		}

		title {
			table = filemeta
			field = title
		}

		description {
			table = filemeta
			field = description
		}

	}

	columns {
		20 {
			fieldIdentifier = fileName
			columnIdentifier = fileName
			label = Datei
		}

		30 {
			fieldIdentifier = modified
			columnIdentifier = modified
			label = Letzte Änderung
		}
	}

}