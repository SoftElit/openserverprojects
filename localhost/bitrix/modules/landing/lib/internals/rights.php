<?php
namespace Bitrix\Landing\Internals;

use \Bitrix\Main\Entity;
use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class RightsTable extends Entity\DataManager
{
	/**
	 * Returns DB table name for entity.
	 * @return string
	 */
	public static function getTableName()
	{
		return 'b_landing_entity_rights';
	}

	/**
	 * Returns entity map definition.
	 * @return array
	 */
	public static function getMap()
	{
		return array(
			'ID' => new Entity\IntegerField('ID', array(
				'title' => 'ID',
				'primary' => true
			)),
			'ENTITY_ID' => new Entity\IntegerField('ENTITY_ID', array(
				'title' => Loc::getMessage('LANDING_TABLE_FIELD_RIGHT_ENTITY_ID'),
				'required' => true
			)),
			'ENTITY_TYPE' => new Entity\StringField('ENTITY_TYPE', array(
				'title' => Loc::getMessage('LANDING_TABLE_FIELD_RIGHT_ENTITY_TYPE'),
				'required' => true
			)),
			'TASK_ID' => new Entity\IntegerField('TASK_ID', array(
				'title' => Loc::getMessage('LANDING_TABLE_FIELD_RIGHT_TASK_ID'),
				'required' => true
			)),
			'ACCESS_CODE' => new Entity\StringField('ACCESS_CODE', array(
				'title' => Loc::getMessage('LANDING_TABLE_FIELD_RIGHT_ACCESS_CODE'),
				'required' => true
			)),
			'ROLE_ID' => new Entity\IntegerField('ROLE_ID', array(
				'title' => Loc::getMessage('LANDING_TABLE_FIELD_BY_ROLE_ID'),
				'default_value' => 0
			)),
			'ROLE' => new Entity\ReferenceField(
				'ROLE',
				'\Bitrix\Landing\Internals\RoleTable',
				array('=this.ROLE_ID' => 'ref.ID')
			),
			'USER_ACCESS' => new Entity\ReferenceField(
				'USER_ACCESS',
				'\Bitrix\Main\UserAccessTable',
				array('=this.ACCESS_CODE' => 'ref.ACCESS_CODE')
			),
			'TASK_OPERATION' => new Entity\ReferenceField(
				'TASK_OPERATION',
				'\Bitrix\Main\TaskOperationTable',
				array('=this.TASK_ID' => 'ref.TASK_ID')
			)
		);
	}
}