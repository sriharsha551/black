<?php
    class Act_purchase_order extends Admin_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Act_purchase_order_model');

            $this->page_title->push('Purchase Orders');
            $this->data['pagetitle'] = $this->page_title->show();

            $this->breadcrumbs->unshift(1, 'Purchase Orders', 'Act_purchase_order');
        }

        public function index()
        {
            $params['limit'] = RECORDS_PER_PAGE;
            $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

            $config = $this->config->item('pagination');
            $config['base_url'] = site_url('Act_purchase_order/index?');
            $config['total_rows'] = $this->Act_purchase_order_model->get_all_purchases_count();
            $this->pagination->initialize($config);
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['purchases'] = $this->Act_purchase_order_model->get_all_purchases($params);
            $this->template->public_render('Act_purchase_order/index', $this->data);
        }

        public function add()
        {
            $this->breadcrumbs->unshift(2, 'Add', 'add');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['suppliers'] = $this->Act_purchase_order_model->get_suppliers();
            $this->data['items'] = $this->Act_purchase_order_model->get_items();
            // print_r($this->data['items']);
            $this->load->library('form_validation');

            $this->form_validation->set_rules('ponumber', 'Purchase Number', 'required');
            $this->form_validation->set_rules('sup_name', 'Supplier Name', 'required');
            $this->form_validation->set_rules('sup_email', 'Supplier Email', 'required');
            $this->form_validation->set_rules('sup_phone', 'Supplier Phone', 'required');
            $this->form_validation->set_rules('sup_address', 'Supplier Address', 'required');
            $this->form_validation->set_rules('items','Item','required');

            if ($this->form_validation->run()) {
                $params = $this->input->post();
                // print_r($params);
                $concept_id = $this->Act_purchase_order_model->add_purchase($params);
                redirect('Act_purchase_order/index');
            } else {
                $_SESSION['error'] = true;
                $this->template->public_render('Act_purchase_order/add', $this->data);
            }
        }

        public function edit($id)
    {
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->data['bills'] = $this->Act_purchase_order_model->get_order($id)[0];
        $this->data['suppliers'] = $this->Act_purchase_order_model->get_suppliers();
        $this->data['items'] = $this->Act_purchase_order_model->get_items();
        // print_r($this->data['items']);
        if (isset($this->data['bills']['id'])) {
            $this->form_validation->set_rules('sup_id', 'Supplier Id', 'required');
            $this->form_validation->set_rules('sup_name', 'Supplier Name', 'required');
            $this->form_validation->set_rules('sup_email', 'Supplier Email', 'required');
            $this->form_validation->set_rules('sup_phone', 'Supplier Phone', 'required');
            $this->form_validation->set_rules('sup_address', 'Supplier Address', 'required');
            $this->form_validation->set_rules('ponumber', 'Purchase Number', 'required');
            
            if ($this->form_validation->run()) {
                $params = $this->input->post();
                $this->Act_purchase_order_model->edit_purchases($id, $params);
                redirect('Act_purchase_order/index');
            } else {
                $_SESSION['edit_error'] = true;
                $this->template->public_render('Act_purchase_order/edit', $this->data);
            }
        } else {
            show_error('The bills you are trying to edit does not exist.');
        }

    }

        public function remove($id)
        {
            $inv = $this->Act_purchase_order_model->get_order($id);
            // check if the stage exists before trying to delete it
            if (isset($inv[0]['id'])) {
                $this->Act_purchase_order_model->delete_purchase($id);
                redirect('Act_purchase_order/index');
            }
        }
    }
?>