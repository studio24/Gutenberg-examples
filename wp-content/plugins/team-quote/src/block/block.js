/**
 * BLOCK: team-quote
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './editor.scss';
import './style.scss';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
const { withSelect } = wp.data;
const { RichText, InspectorControls } = wp.editor;
const {
	PanelBody,
	SelectControl,
} = wp.components;

/**
 * Register: aa Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */

registerBlockType( 'cgb/block-team-quote', {
	// Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'team-quote' ), // Block title.
	icon: 'groups', // Block icon from Dashicons → https://developer.wordpress.org/resource/dashicons/.
	category: 'common', // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
	keywords: [
		__( 'team-quote' ),
		__( 'create-guten-block' ),
	],
	attributes: {
		message: {
			type: 'string',
			source: 'html',
			selector: '.message',
		},
		imgURL: {
			type: 'string',
			source: 'attribute',
			attribute: 'src',
			selector: 'img',
		},
		personName: {
			type: 'string',
		},
		selectPerson: {
			type: 'number',
			default: 111,
		},
	},

	/**
	 * The edit function describes the structure of your block in the context of the editor.
	 * This represents what the editor will render when the block is used.
	 *
	 * The "edit" property must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 *
	 * @param {Object} props Props.
	 * @returns {Mixed} JSX Component.
	 */

	edit: withSelect( function( select ) {
		const pages = select( 'core' ).getEntityRecords( 'postType', 'people', { per_page: 10 } );
		return {
			posts: pages,
		};
	} )( function( props ) {
		const { attributes: { message, selectPerson, imgURL, personName }, className, setAttributes, isSelected } = props;

		if ( ! props.posts ) {
			return 'Loading...';
		}

		if ( props.posts.length === 0 ) {
			return 'No posts';
		}

		var people = [];
		var options = [];
		for ( var i = 0; i < props.posts.length; i++ ) {
			var option = { value: props.posts[i].id, label: __( props.posts[i].title.rendered, 'cgb' ) };

			people.push( { id: props.posts[i].id, name: props.posts[i].title.rendered, url: props.posts[i].avatar.sizes.thumbnail } );
			options.push( option );
		}

		setAttributes( { imgURL: people.find( x => x.id === selectPerson ).url } );
		setAttributes( { personName: people.find( x => x.id === selectPerson ).name } );

		const onChangePerson = selectPerson => {
			selectPerson = parseInt( selectPerson );

			setAttributes( { selectPerson: selectPerson } );
			setAttributes( { imgURL: people.find( x => x.id === selectPerson ).url } );
			setAttributes( { personName: people.find( x => x.id === selectPerson ).name } );
		};

		var select = <SelectControl
			label={ __( 'Person', 'cgb' ) }
			value={ selectPerson }
			options={ options }
			onChange={ onChangePerson }
		/>;


		return [
			isSelected && (
				<InspectorControls>
					<PanelBody
						title={ __( 'Team', 'cgb' ) }
					>
						{ select }
					</PanelBody>
				</InspectorControls>
			),
			<div className={ className }>
				<RichText
					tagName="message"
					placeholder={ __( 'Add your message', 'cgb' ) }
					value={ message }
					onChange={ message => setAttributes( { message } ) }
				/>
				<img
					src={ imgURL }
					alt={ personName }
				/>
				<p>{ personName + ', Studio 24' }</p>
			</div>,
		];
	} ),

	/**
	 * The save function defines the way in which the different attributes should be combined
	 * into the final markup, which is then serialized by Gutenberg into post_content.
	 *
	 * The "save" property must be specified and must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 *
	 * @param {Object} props Props.
	 * @returns {Mixed} JSX Frontend HTML.
	 */
	save: ( props ) => {
		const { attributes: { message, imgURL, personName } } = props;

		return (
			<div className={ props.className }>
				<p className="message">{ message }</p>
				<img
					src={ imgURL }
					alt={ personName }
				/>
				<cite className="cite"> { personName + ', Studio 24' } </cite>
			</div>
		);
	},
} );
