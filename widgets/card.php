<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Pricing Card.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_pricingCard_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Pricing Card name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'pricingCard';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Pricing Card title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Pricing Card', 'elementor-pricing-card' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Pricing Card icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-code';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Pricing Card belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the Pricing Card belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'pricing card', 'pricing', 'card' ];
	}

    public function get_script_depends() {
		return [ 'pricing-card-js' ];
	}

	public function get_style_depends() {
		return [ 'pricing-card-css' ];
	}

	/**
	 * Register Pricing Card controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-pricing-card' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'total_interval',
			[
				'label' => esc_html__( 'Maximum Interval Value', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 1000,
				'step' => 5,
				'default' => 250,
			]
		);


		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'min_interval',
			[
				'label' => esc_html__( 'Min Interval value', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 1000,
				'step' => 5,
				'default' => 1,
			]
		);

		$repeater->add_control(
			'max_interval',
			[
				'label' => esc_html__( 'Max Interval value', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 1000,
				'step' => 5,
				'default' => 250,
			]
		);

		$repeater->add_control(
			'interval_title',
			[
				'label' => esc_html__( 'Interval Title', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Digiposte Access' , 'elementor-pricing-card' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'interval_label',
			[
				'label' => esc_html__( 'Interval Label', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '1 mois d’essai gratuit' , 'elementor-pricing-card' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'radio_text',
			[
				'label' => esc_html__( 'Radio Text', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '<strong>60</strong> destinataires' , 'elementor-pricing-card' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'pricing',
			[
				'label' => esc_html__( 'Price', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '89,90 €' , 'elementor-pricing-card' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'pricing_top_text',
			[
				'label' => esc_html__( 'Pricing Text', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'HT / mois sans engagement' , 'elementor-pricing-card' ),
				'label_block' => true,
			]
		);


		$repeater->add_control(
			'interval_description',
			[
				'label' => esc_html__( 'Description', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( '<ul>                                                                    
                <li>Envoi illimité de documents à valeur probante</li>
                <li>Coffres-forts Digiposte gratuits pour vos destinataires</li>
                <li>Jusqu’à 2 utilisateurs</li>
                <li>Rapports en temps réel</li>
                <li>Aide en ligne et support client par e-mail</li> 
				<li>Mode de paiement par CB</li> 
              </ul>', 'elementor-pricing-card' ),
				'placeholder' => esc_html__( 'Type your description here', 'elementor-pricing-card' ),
			]
		);

        $repeater->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Button Text', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Inscrivez-vous' , 'elementor-pricing-card' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Button Link', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'intervals',
			[
				'label' => esc_html__( 'Intervals List', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'interval_title' => esc_html__( 'Digiposte Access', 'elementor-pricing-card' ),
					],
				],
				'title_field' => '{{{ interval_title }}}',
			]
		);

		$this->add_control(
			'bottom_block_descripton',
			[
				'label' => esc_html__( 'Bottom Block Title', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Vous avez plus de 
				<strong>250 destinataires ?</strong>', 'elementor-pricing-card' ),
				'placeholder' => esc_html__( 'Type your description here', 'elementor-pricing-card' ),
			]
		);

        $this->add_control(
			'bottom_block_link_title',
			[
				'label' => esc_html__( 'Bottom Block Button Text', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Contactez-nous' , 'elementor-pricing-card' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'bottom_block_link',
			[
				'label' => esc_html__( 'Bottom Block Button Link', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'bottom_block_link_title_addon',
			[
				'label' => esc_html__( 'Bottom Block Button Text Addon', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'pour une offre sur-mesure' , 'elementor-pricing-card' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'elementor-pricing-card' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'card_align',
			[
				'label' => esc_html__( 'Card Alignment', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'right' => [
						'title' => esc_html__( 'Left', 'elementor-pricing-card' ),
						'icon' => 'eicon-text-align-left',
					],
					'left' => [
						'title' => esc_html__( 'Right', 'elementor-pricing-card' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .offer-card-inner' => 'margin: unset; margin-{{VALUE}}: auto;',
					'{{WRAPPER}} .more-offer' => 'margin: unset; margin-{{VALUE}}: auto; margin-top: 18px;',

				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Interval Title', 'elementor-pricing-card' ),
				'name' => 'intervalTitle_typography',
				'selector' => '{{WRAPPER}} .access-offer-ruler .offer-name',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Interval Label', 'elementor-pricing-card' ),
				'name' => 'intervalLabel_typography',
				'selector' => '{{WRAPPER}} .access-offer-ruler .offer-cartridge',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Range Text', 'elementor-pricing-card' ),
				'name' => 'intervalRange_typography',
				'selector' => '{{WRAPPER}} .access-offer-ruler .rangeslider output',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Min & Max Text', 'elementor-pricing-card' ),
				'name' => 'intervalMinMax_typography',
				'selector' => '{{WRAPPER}} .access-offer-ruler .range .recipients-data',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Offer Price', 'elementor-pricing-card' ),
				'name' => 'intervalofferPrice_typography',
				'selector' => '{{WRAPPER}} .access-offer-ruler .offer-quick-infos .offer-price',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Offer Price Top Text', 'elementor-pricing-card' ),
				'name' => 'intervaltoptext_typography',
				'selector' => '{{WRAPPER}} .access-offer-ruler .offer-quick-infos .offer-price-text .txt-black',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Offer Price Bottom Text', 'elementor-pricing-card' ),
				'name' => 'intervalbottomtext_typography',
				'selector' => '{{WRAPPER}} .access-offer-ruler .offer-quick-infos .offer-price-text .txt-blue',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Description', 'elementor-pricing-card' ),
				'name' => 'intervalDescription_typography',
				'selector' => '{{WRAPPER}} .access-offer-ruler .offer-card .offer-card-inner ul li, {{WRAPPER}} .access-offer-ruler .offer-card .offer-card-inner .description',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Button Text', 'elementor-pricing-card' ),
				'name' => 'intervalDescription_typography',
				'selector' => '{{WRAPPER}} .access-offer-ruler .offer_cta',
			]
		);

		$this->add_control(
			'primaryColor',
			[
				'label' => esc_html__( 'Color Palette One', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#393af1',
				'selectors' => [
					'{{WRAPPER}} .access-offer-ruler .offer-name' => 'color: {{VALUE}}',
					'{{WRAPPER}} .access-offer-ruler .offer-quick-infos .offer-price-text .txt-blue' => 'color: {{VALUE}}',
					'{{WRAPPER}} .access-offer-ruler .offer_cta' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'secondaryColor',
			[
				'label' => esc_html__( 'Color Palette Two', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffc105',
				'selectors' => [
					'{{WRAPPER}} .access-offer-ruler .rangeslider .rangeslider__handle' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .access-offer-ruler .rangeslider .rangeslider__fill' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .access-offer-ruler .rangeslider output' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .access-offer-ruler .offer-cartridge' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .access-offer-ruler .rangeslider output:after' => 'border-top-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'tertiaryColor',
			[
				'label' => esc_html__( 'Color Palette Three', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffeb99',
				'selectors' => [
					'{{WRAPPER}} .access-offer-ruler .offer-cartridge' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'tertiaryColorFour',
			[
				'label' => esc_html__( 'Color Palette Four', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffc1052e',
				'selectors' => [
					'{{WRAPPER}} .access-offer-ruler .rangeslider' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .access-offer-ruler .rangeslider .rangeslider__handle' => 'outline-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'label' => esc_html__( 'Card Border', 'elementor-pricing-card' ),
				'name' => 'border',
				'selector' => '{{WRAPPER}} .access-offer-ruler .offer-card .offer-card-inner',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'label' => esc_html__( 'Card Shadow', 'elementor-pricing-card' ),
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .access-offer-ruler .offer-card .offer-card-inner',
			]
		);

		$this->add_control(
			'max-width',
			[
				'label' => esc_html__( 'Max Card Width', 'elementor-pricing-card' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 523,
				],
				'selectors' => [
					'{{WRAPPER}} .access-offer-ruler .offer-card .offer-card-inner' => 'max-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .access-offer-ruler .more-offer' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Pricing Card output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		// echo "<pre>";
		// print_r($settings['intervals']);
		if ( ! empty( $settings['bottom_block_link']['url'] ) ) {
			$this->add_link_attributes( 'bottom_block_link', $settings['bottom_block_link'] );
		}
        ?>
        <div class="access-offer-ruler">
            <div 
                class="offer-card" 
                data-slider-id="1"
                data-min="0" 
                data-max="<?php echo $settings['total_interval']; ?>"
				data-intervals="<?php echo htmlspecialchars(json_encode($settings['intervals'])); ?>"
            >
              <div class="offer-card-inner">
				<div class="header">
					<img src="<?php echo PRICING_CARD_WIDGET_URL; ?>assets/images/cartoon.png" alt="CARTOON IMAGE">
					<span class="offer-cartridge"><?php echo $settings['intervals'][0]['interval_label']; ?></span>
				</div>
				<div class="body">
				<div class="heading">
                    <h3 class="offer-name"><?php echo $settings['intervals'][0]['interval_title']; ?></h3>
                  </div>
    
                  <!-- Range Slider -->
                  <div class="range"  
                  >
                      <div class="rangeslider rangeslider--horizontal" id="js-rangeslider-0">
                        <div class="rangeslider__fill" ></div>
                        <div class="rangeslider__handle" >
                          <output class="js-output">
                            <?php echo $settings['intervals'][0]['radio_text']; ?>
                          </output>
                        </div>
                      </div>
                      
                  </div>
                  <!-- / Range Slider -->
    
                  <div class="offer-quick-infos">
                      <div class="offer-price "><?php echo $settings['intervals'][0]['pricing']; ?></div>
                      <div class="offer-price-text">
						<div class="txt-black">
							<?php echo $settings['intervals'][0]['pricing_top_text']; ?>
						</div>
                      </div>
                  </div>
				  <a href="<?php echo $settings['intervals'][0]['button_link']['url']; ?>" class="offer_cta" type="button" data-initial-label="Sélectionner" ><?php echo $settings['intervals'][0]['button_text']; ?></a>
				</div>
				<div class="description">
                  	<?php echo $settings['intervals'][0]['interval_description']; ?>
				  </div>
              </div>
          </div>
		  <div class="more-offer">
			<h3>
			<?php echo $settings['bottom_block_descripton']; ?>
			</h3>
			<p>
				<a <?php echo $this->get_render_attribute_string( 'bottom_block_link' ); ?>><?php echo $settings['bottom_block_link_title']; ?></a>
				<?php echo $settings['bottom_block_link_title_addon']; ?>
			</p>
		  </div>
        </div>
        <?php

	}

}