/**
 * Version File for Grunt
 *
 * @package feedzy-rss-feeds-pro
 */
/* jshint node:true */
// https://github.com/kswedberg/grunt-version
module.exports = {
	options: {
		pkg: {
			version: '<%= package.version %>'
		}
	},
	project: {
		src: [
			'package.json'
		]
	},
	style: {
		options: {
			prefix: 'Version\\:\.*\\s'
		},
		src: [
			'jft-assistant.php'
		]
	},
	class: {
		options: {
            prefix: 'JFT_ASSISTANT_VERSION__\'\,\\s+\''
		},
		src: [
			'jft-assistant.php',
		]
	}
};
