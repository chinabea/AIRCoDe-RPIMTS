<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\CallForProposal;
use App\Models\LineItemBudget;
use App\Models\Project;
use App\Models\User;
use App\Models\Task;
use App\Models\File;
use App\Models\Member;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application' => '',s database.
     */
    public function run(): void
    {
        
        // \App\Models\User::factory(8)->create();

        $users = [
            [
                'name' => 'China',
                'email' => 'chibea@my.cspc.edu.ph',
                'role' => 1, 
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Jessemri Tabayag',
                'email' => 'jessemtabayag@gmail.com',
                'role' => 2, 
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Louie Molina',
                'email' => 'loumolina@my.cspc.edu.ph',
                'role' => 3, 
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Bea',
                'email' => 'biyanachi@gmail.com',
                'role' => 3, 
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Mark Louis',
                'email' => 'mlodavar@my.cspc.edu.ph',
                'role' => 4, 
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Louie Molina',
                'email' => '026ginuie@gmail.com',
                'role' => 4, 
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Jessemri Tabayag',
                'email' => 'jestabayag@my.cspc.edu.ph',
                'role' => 4, 
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'John Carlo Dacara',
                'email' => 'jcdacara@my.cspc.edu.ph',
                'role' => 4, 
                'password' => Hash::make('password'),
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }

        $callForProposalsData = [
            [
                'title' => 'AI for Community Health',
                'description' => 'This call for proposals invites projects aimed at leveraging AI to improve community health outcomes.',
                'start_date' => '2023-10-29',
                'end_date' => '2023-11-28',
            ],
            [
                'title' => 'Data-Driven Gardening Solutions',
                'description' => 'This call for proposals seeks innovative projects that use data-driven approaches to improve gardening practices and crop yields.',
                'start_date' => '2023-10-31',
                'end_date' => '2023-11-28',
            ],
            [
                'title' => 'Empowering Local Communities',
                'description' => 'This call for proposals focuses on projects that empower local communities through research and development initiatives.',
                'start_date' => '2023-06-21',
                'end_date' => '2023-12-28',
            ],
            [
                'title' => 'Sustainable Agriculture Solutions',
                'description' => 'Submit your proposals for sustainable agriculture solutions that promote eco-friendly farming practices.',
                'start_date' => '2023-02-01',
                'end_date' => '2023-05-18',
            ],
            [
                'title' => 'Environmental Conservation Innovations',
                'description' => 'We welcome proposals for projects dedicated to environmental conservation and the protection of natural resources.',
                'start_date' => '2023-06-07',
                'end_date' => '2023-07-28',
            ],
            [
                'title' => 'AI in Healthcare Research',
                'description' => 'This call for proposals focuses on AI research in healthcare and its potential to transform the medical field.',
                'start_date' => '2023-11-24',
                'end_date' => '2023-12-25',
            ],
            [
                'title' => 'Community Development Initiatives',
                'description' => 'Submit your proposals for community development initiatives that drive positive change and social impact.',
                'start_date' => '2023-05-01',
                'end_date' => '2023-08-28',
            ],
        ];
        

        foreach ($callForProposalsData as $data) {
            CallForProposal::create($data);
        }
        
        $projectsData = [
            [
                'tracking_code' => 'T4N5GF94',
                'user_id' => '3',
                'call_for_proposal_id' => 1, 
                'project_name' => 'AI-Enabled Healthcare',
                'status' => 'Under Evaluation',
                'research_group' => 'Health Informatics Research Group',
                'introduction' => 'This research project focuses on leveraging AI and machine learning in healthcare to improve patient outcomes and streamline medical processes.',
                'aims_and_objectives' => 'The primary aim is to develop AI algorithms for early disease detection and treatment optimization. Objectives include creating predictive models, optimizing drug dosages, and improving patient monitoring.',
                'background' => 'The background of this research lies in the growing need for efficient healthcare solutions, especially in the context of an aging population and increasing healthcare costs.',
                'expected_research_contribution' => 'The expected contribution includes reducing healthcare costs, improving patient care, and increasing the accuracy of disease diagnosis.',
                'proposed_methodology' => 'The proposed methodology involves data collection, feature engineering, model training, and validation. Machine learning models will be developed to predict health outcomes and provide treatment recommendations.',
                'workplan' => 'The research will be conducted over a span of two years. Year 1 will focus on data collection and model development, while Year 2 will involve validation and clinical trials.',
                'resources' => 'The research will require access to electronic health records, medical imaging data, and a team of data scientists and healthcare professionals.',
                'references' => '1. Smith, J., et al. (2020). "AI in Healthcare: A Review." Journal of Medical Research, 45(2), 123-135.',
            ],
            [
                'tracking_code' => 'HO69KG4R',
                'user_id' => '4',
                'call_for_proposal_id' => '1', 
                'project_name' => 'AI for Community Health',
                'status' => 'Draft',
                'research_group' => 'HealthTech AI Research Group',
                'introduction' => 'This project aims to leverage AI to improve community health outcomes.',
                'aims_and_objectives' => 'The main objectives are to predict disease outbreaks and optimize healthcare resource allocation.',
                'background' => 'Community health is a critical concern, and AI can provide data-driven insights.',
                'expected_research_contribution' => 'We expect to reduce disease morbidity and mortality rates.',
                'proposed_methodology' => 'We will use machine learning models on health data and historical disease patterns.',
                'workplan' => 'The project will span two years, involving data collection, model development, and testing.',
                'resources' => 'We will need access to health data, computational resources, and domain experts.',
                'references' => '1. Smith, J. et al. (2021). AI in Healthcare: A Review. Journal of Health Informatics.
                    2. Johnson, M. (2020). Predicting Disease Outbreaks with Machine Learning. Proceedings of AI in Healthcare Conference.'
                
            ],
            [
                'tracking_code' => '03KY9JT7',
                'user_id' => '3',
                'call_for_proposal_id' => '1', 
                'project_name' => 'Community Health Improvement Program',
                'status' => 'For Revision',
                'research_group' => 'Health and Wellness',
                'introduction' => 'This research aims to improve the overall health of the community by addressing various health issues and promoting healthy living.',
                'aims_and_objectives' => 'The main objectives of this research are to reduce the prevalence of preventable diseases, improve healthcare access, and educate the community on healthy lifestyle choices.',
                'background' => 'The community has been facing health challenges due to factors like lack of access to healthcare facilities and insufficient health education.',
                'expected_research_contribution' => 'This research is expected to contribute to a healthier community with a reduced burden of diseases and better access to healthcare services.',
                'proposed_methodology' => 'The research will involve community health assessments, awareness campaigns, partnerships with local healthcare providers, and data collection on health outcomes.',
                'workplan' => 'The research will be carried out over a span of 2 years, with various phases focusing on different aspects of community health improvement.',
                'resources' => 'Resources required include funding, healthcare professionals, educational materials, and data collection tools.',
                'references' => '1. World Health Organization (WHO). (2021). Community Health Improvement Strategies. Geneva: WHO.',
            ],
            [
                'tracking_code' => 'HS8L3DJX',
                'user_id' => '4',
                'call_for_proposal_id' => '4', 
                'project_name' => ' Sustainable Urban Planning',
                'status' => 'Draft',
                'research_group' => 'Urban Development Research Team',
                'introduction' => 'The rapid growth of urban areas presents various challenges, including increased pollution, limited resources, and a strain on existing infrastructure. This research project aims to address these challenges by developing sustainable urban planning strategies.',
                'aims_and_objectives' => '1. To analyze the current urban development trends.
                    2. To identify key areas of improvement in urban planning.
                    3. To propose sustainable strategies for future urban development.',
                'background' => 'With the worlds population shifting towards urban areas, there is a pressing need to ensure that cities are sustainable, resilient, and able to provide a high quality of life for their residents.',
                'expected_research_contribution' => 'This research project is expected to contribute by providing guidelines for sustainable urban planning that can be applied by city planners, policymakers, and urban development professionals.',
                'proposed_methodology' => '1. Literature review of urban development trends.
                    2. Data collection from various cities.
                    3. Analysis of best practices in sustainable urban planning.
                    4. Development of sustainable urban planning models.',
                'workplan' => 'Phase 1: Literature Review
                    Phase 2: Data Collection
                    Phase 3: Analysis
                    Phase 4: Model Development
                    Phase 5: Recommendations and Guidelines',
                'resources' => 'This project will require access to urban development data, collaboration with experts in the field, and access to urban planning tools and software.',
                'references' => '1. Smith, J. (2020). Sustainable Urban Development: Strategies for the 21st Century.
                    2. Johnson, L. (2019). Urban Planning in the Age of Sustainability.
                    3. United Nations. (2018). Sustainable Cities and Communities: Goal 11.',
            ],
            [
                'tracking_code' => 'KE70M3HD',
                'user_id' => '3',
                'call_for_proposal_id' => '2', 
                'project_name' => 'Community Garden Project',
                'status' => 'Approved',
                'research_group' => 'Environmental Studies',
                'introduction' => 'This research aims to promote sustainable urban agriculture and community well-being through the establishment of community gardens.',
                'aims_and_objectives' => 'The primary aim is to provide access to fresh and healthy produce while fostering a sense of community. Objectives include garden design, community involvement, and sustainability.',
                'background' => 'The project was initiated in response to the lack of access to fresh produce in the local community. Food insecurity and the desire to build a stronger community led to its creation.',
                'expected_research_contribution' => 'The project is expected to improve access to healthy food, create a stronger sense of community, and serve as a model for sustainable urban agriculture.',
                'proposed_methodology' => 'The research involves community engagement, garden design, and sustainable agricultural practices. Data collection will include surveys and observations.',
                'workplan' => 'The project is divided into phases, including garden planning, construction, and maintenance. A timeline has been established for each phase.',
                'resources' => 'Resources include community volunteers, gardening tools, and materials for garden construction. Funding is obtained through donations and grants.',
                'references' => '1. Sustainable Urban Agriculture: Best Practices. 2. Community Engagement and Gardening. 3. Food Security and Urban Development.',
            ],
            [
                'tracking_code' => 'NRO835DG',
                'user_id' => '4',
                'call_for_proposal_id' => '3', 
                'project_name' => 'Improving Education Access',
                'status' => 'Deferred',
                'research_group' => 'Education and Community Development',
                'introduction' => 'This research aims to improve access to quality education in underserved communities.',
                'aims_and_objectives' => 'The primary objective is to increase literacy rates and enhance educational opportunities for children in remote areas.',
                'background' => 'Many children in remote areas lack access to proper education due to limited resources and infrastructure.',
                'expected_research_contribution' => 'The research intends to identify challenges and propose sustainable solutions for improving educational access.',
                'proposed_methodology' => 'The research will involve field surveys, interviews, and data analysis to assess the existing education systems.',
                'workplan' => 'The project will be carried out in phases, starting with needs assessment and concluding with the implementation of educational programs.',
                'resources' => 'We require funding, educational materials, and partnerships with local communities and schools.',
                'references' => '1. UNESCO Education for All Report (2019), 2. World Bank Education Initiatives (2020)',

            ],
            [
                'tracking_code' => '03MFYELT',
                'user_id' => '3',
                'call_for_proposal_id' => '7', 
                'project_name' => 'Clean Energy Initiative',
                'status' => 'Disapproved',
                'research_group' => 'Environmental Sustainability',
                'introduction' => 'This research focuses on promoting clean energy solutions and reducing the carbon footprint.',
                'aims_and_objectives' => 'The objective is to transition to renewable energy sources and mitigate environmental impact.',
                'background' => 'The world faces environmental challenges due to fossil fuel consumption, leading to climate change.',
                'expected_research_contribution' => 'The research aims to discover clean energy alternatives and advocate for sustainable practices.',
                'proposed_methodology' => 'The research will involve scientific studies, energy assessments, and pilot clean energy projects.',
                'workplan' => 'The project will include phases for energy audits, technology selection, and community engagement.',
                'resources' => 'Funding, access to renewable energy technologies, and partnerships with energy experts and organizations are needed.',
                'references' => '1. IPCC Special Report on Renewable Energy Sources (2011), 2. United Nations Sustainable Development Goals (SDG 7)',
            ],
            [
                'tracking_code' => '83MFYE6LJ',
                'user_id' => '3',
                'call_for_proposal_id' => '7', 
                'project_name' => 'Improving Local Education',
                'status' => 'Under Evaluation',
                'research_group' => 'Education for All',
                'introduction' => 'This research project aims to improve local education standards in underserved communities.',
                'aims_and_objectives' => 'The primary aim is to enhance access to quality education. Objectives include building new schools, providing resources, and teacher training.',
                'background' => 'Many remote areas lack access to proper education. This research addresses the root causes of these issues.',
                'expected_research_contribution' => 'The project will contribute by increasing literacy rates and educational opportunities for children in these communities.',
                'proposed_methodology' => 'The project involves building schools, hiring local teachers, providing learning materials, and creating community engagement programs.',
                'workplan' => 'The workplan includes six phases: assessment, planning, implementation, monitoring, evaluation, and sustainability.',
                'resources' => 'Funding is provided by local and international organizations, including volunteers for teaching.',
                'references' => '1. UNESCO Education for All Report (2019)
                    2. National Education Association - Community Outreach Program'
            ],
            [
                'tracking_code' => '4GK6FNUI',
                'user_id' => '3',
                'call_for_proposal_id' => '7', 
                'project_name' => 'Community Literacy Program',
                'status' => 'Draft',
                'research_group' => 'Education and Social Development',
                'introduction' => 'This project aims to improve literacy rates in underserved communities.',
                'aims_and_objectives' => '1. Enhance reading and writing skills. 2. Promote a culture of learning.',
                'background' => 'Low literacy rates hinder social and economic progress in the community.',
                'expected_research_contribution' => 'Improved literacy will lead to better job opportunities and community development.',
                'proposed_methodology' => 'Conduct literacy workshops and distribute educational materials.',
                'workplan' => '1. Identify target communities. 2. Develop teaching materials. 3. Organize workshops.',
                'resources' => 'Funding, volunteers, educational materials.',
                'references' => '1. UNESCO Education for All Report. 2. Smith, J. (2019). Literacy Programs and Community Development.',
            
            ],
            [
                'tracking_code' => 'HF63VJR6',
                'user_id' => '3',
                'call_for_proposal_id' => '7', 
                'project_name' => 'Improving Local Education',
                'status' => 'For Revision',
                'research_group' => 'Education Research Team',
                'introduction' => 'This research aims to enhance the quality of local education.',
                'aims_and_objectives' => 'The main objectives are to identify educational gaps and propose improvements.',
                'background' => 'The background shows the current state of local education and its challenges.',
                'expected_research_contribution' => 'This research will provide actionable recommendations for educational reforms.',
                'proposed_methodology' => 'We will conduct surveys, interviews, and data analysis.',
                'workplan' => 'The project is scheduled to run for 12 months with several milestones.',
                'resources' => 'We need funding, research tools, and qualified researchers.',
                'references' => '1. Local Education Report 2020, 2. Education Improvement Handbook',
            
            ],
            [
                'tracking_code' => 'MHL80N6G',
                'user_id' => '3',
                'call_for_proposal_id' => '7', 
                'project_name' => 'Environmental Sustainability in Urban Areas',
                'status' => 'Under Evaluation',
                'research_group' => 'Sustainability Research Group',
                'introduction' => 'This research project aims to explore and implement sustainable practices in urban environments to reduce the ecological footprint and promote a healthier and greener future for urban areas.',
                'aims_and_objectives' => 'The main objectives of this research are to assess current environmental challenges in urban areas, develop sustainable solutions, and promote eco-friendly practices among urban communities.',
                'background' => 'Urbanization has led to increased pollution, resource depletion, and habitat destruction. This research addresses the need for sustainable urban development.',
                'expected_research_contribution' => 'This project is expected to contribute valuable insights into sustainable urban planning and policy development, leading to improved environmental conditions and enhanced quality of life in urban areas.',
                'proposed_methodology' => 'The research will involve data collection, analysis, and collaboration with urban planners, policymakers, and local communities to implement sustainable practices and measure their impact.',
                'workplan' => 'The project is scheduled to be completed in two years and includes research, data collection, pilot programs, and monitoring of environmental indicators.',
                'resources' => 'The research team will require access to data, funding, collaboration with local authorities, and the support of urban communities to carry out this project successfully.',
                'references' => '1. Smith, J. et al. (2022). Sustainable Urban Development. Springer.
                                2. Green, A. (2021). Urban Sustainability Practices. Oxford University Press.'
            
            ],
            [
                'tracking_code' => 'HK7KF9NF',
                'user_id' => '3',
                'call_for_proposal_id' => '7', 
                'project_name' => 'Community Green Energy Initiative',
                'status' => 'Under Evaluation',
                'research_group' => 'Sustainability Research Team',
                'introduction' => 'The Community Green Energy Initiative aims to create sustainable and eco-friendly energy solutions for our local community.',
                'aims_and_objectives' => '1. Develop solar power solutions to reduce energy costs for community members.
                    2. Promote the use of wind turbines for clean energy.
                    3. Educate the community on sustainable energy practices.',
                'background' => 'The community has been facing rising energy costs and increasing environmental concerns. This project addresses these issues by harnessing renewable energy sources.',
                'expected_research_contribution' => 'This research aims to provide affordable and clean energy solutions for the community, reducing carbon footprint and energy expenses.',
                'proposed_methodology' => '1. Survey the community to understand energy needs.
                    2. Install solar panels and wind turbines in key locations.
                    3. Monitor and analyze energy production and usage.
                    4. Provide workshops and resources for community members.',
                'workplan' => 'Phase 1: Survey and data collection
                    Phase 2: Solar and wind infrastructure setup
                    Phase 3: Monitoring and analysis
                    Phase 4: Community education and outreach',
                'resources' => 'Funding from local grants, solar panels, wind turbines, monitoring equipment, community volunteers',
                'references' => '1. "Renewable Energy for Communities" by John Doe, 2020.
                    2. "Wind Energy Basics" by Jane Smith, 2019.',
            ],
        ];

        foreach ($projectsData as $data) {
            Project::create($data);
        }
                $members = [
            [
                'project_id' => 1,
                'member_name' => 'Sample Member 1',
                'role' => 1,
            ],
            [
                'project_id' => 1,
                'member_name' => 'Sample Member 2',
                'role' => 2,
            ],
            [
                'project_id' => 1,
                'member_name' => 'John Doe',
                'role' => 'Researcher',
            ],
            [
                'project_id' => 1,
                'member_name' => 'Jane Smith',
                'role' => 'Reviewer',
            ],
        ];

        foreach ($members as $memberData) {
            Member::create($memberData);
        }

        $tasks = [
            [
                'project_id' => 1,
                'title' => 'Sample Task 1',
                'description' => 'Description of Task 1',
                'start_date' => '2023-10-30',
                'end_date' => '2023-11-15',
                'assigned_to' => 2,
            ],
            [
                'project_id' => 1,
                'title' => 'Sample Task 2',
                'description' => 'Description of Task 2',
                'start_date' => '2023-11-01',
                'end_date' => '2023-11-20',
                'assigned_to' => 3,
            ],
            [
                'project_id' => 1,
                'title' => 'Task 1',
                'description' => 'Description of Task 1',
                'start_date' => '2023-10-29',
                'end_date' => '2023-11-28',
                'assigned_to' => 2,
            ],
            [
                'project_id' => 1,
                'title' => 'Task 2',
                'description' => 'Description of Task 2',
                'start_date' => '2023-11-01',
                'end_date' => '2023-11-30',
                'assigned_to' => 3,
            ],
        ];

        foreach ($tasks as $taskData) {
            Task::create($taskData);
        }

        $libs = [
            [
                'project_id' => 1,
                'name' => 'Sample Item 1',
                'quantity' => 5,
                'unit_price' => 10.99,
            ],
            [
                'project_id' => 1,
                'name' => 'Sample Item 2',
                'quantity' => 3,
                'unit_price' => 15.50,
            ],
            [
                'project_id' => 1,
                'name' => 'Item 1',
                'quantity' => 5,
                'unit_price' => 20.00,
            ],
            [
                'project_id' => 1,
                'name' => 'Item 2',
                'quantity' => 10,
                'unit_price' => 15.00,
            ],
        ];

        foreach ($libs as $libData) {
            LineItemBudget::create($libData);
        }

        $files = [
            [
                'project_id' => 1,
                'file_name' => 'Sample File 1',
                'file_path' => 'path_to_file_1.pdf',
            ],
            [
                'project_id' => 1,
                'file_name' => 'Sample File 2',
                'file_path' => 'path_to_file_2.pdf',
            ],
            [
                'project_id' => 1,
                'file_name' => 'File 1',
                'file_path' => 'path/to/file1.pdf',
            ],
            [
                'project_id' => 1,
                'file_name' => 'File 2',
                'file_path' => 'path/to/file2.pdf',
            ],
        ];

        foreach ($files as $fileData) {
            File::create($fileData);
        }

        $reviews = [
            [
                'user_id' => 5,
                'project_id' => 1,
                'deadline' => '2023-11-10',
                'contribution_to_knowledge' => 'The paper significantly contributes to the existing body of knowledge in the field.',
                'technical_soundness' => 'The paper demonstrates a high level of technical soundness.',
                'comprehensive_subject_matter' => 'The subject matter is presented comprehensively, covering all relevant aspects and providing a clear understanding of the topic.',
                'applicable_and_sufficient_references' => 'The references are both relevant and sufficient, supporting the claims and arguments made in the paper.',
                'inappropriate_references' => 'No, all references are appropriate and directly related to the topic under discussion.',
                'comprehensive_application' => 'The application described in the paper is comprehensive and well-detailed, making it easy to replicate or implement.',
                'grammar_and_presentation' => 'The grammar and presentation are generally good, with only minor issues that do not significantly impact the paper-s overall quality.',
                'assumption_of_reader_knowledge' => 'The submission is indeed highly technical, but it does not assume excessive prior knowledge, as it provides adequate explanations for complex concepts.',
                'clear_figures_and_tables' => 'The figures and tables are clear and enhance the reader-s understanding of the content, making them easy to interpret.',
                'adequate_explanations' => 'The explanations provided throughout the paper are adequate, ensuring that readers can follow the author-s reasoning and methodology.',
                'technical_or_methodological_errors' => 'There are no major technical or methodological errors in the paper. The research design and methodology are robust and well-executed.',
                'reseach_project_name' => 'The title of the research project is concise and clearly reflects the study-s focus.',
                'reseach_project_group' => 'It would be helpful to provide more information about the research project group, such as the members qualifications and roles.',
                'project_introduction' => 'The introduction provides a good overview of the research project-s background and significance. Consider adding a brief statement about the project-s objectives.',
                'project_aims_and_objectives' => 'The aims and objectives of the project are well-defined and align with the research-s purpose.',
                'project_background' => 'The background section effectively contextualizes the research problem. Consider including recent developments or trends in the field, if applicable.',
                'project_expected_research_contribution' => 'It would be beneficial to outline the expected contributions of the research project more explicitly.',
                'project_proposed_methodology' => 'The proposed methodology is detailed and appropriate for addressing the research questions. Ensure that ethical considerations are addressed.',
                'project_workplan' => 'The work plan is well-structured and outlines the project-s timeline and milestones effectively.',
                'project_resources' =>'Provide a clear description of the resources required for the project, including equipment, materials, and funding sources.',
                'project_references' => 'The list of references is well-cited and relevant to the project. Ensure that all citations follow the appropriate format consistently.',
                'project_total_budget' =>'Include a detailed breakdown of the total budget, including expenses for each phase of the project.', 
                'other_comments' =>'The paper is well-structured and logically organized. The literature review is comprehensive, and the research questions are clearly defined. It would be beneficial to include a brief discussion of potential limitations.',
                'review_decision' =>'Accepted',
            
            ],
            [
                'user_id' => 6,
                'project_id' => 1,
                'deadline' => '2023-11-10',
                'contribution_to_knowledge' => 'Yes, the paper makes a valuable contribution to the existing body of knowledge by presenting innovative findings in the field.',
                'technical_soundness' => 'The paper demonstrates a high level of technical competence and rigor, ensuring the reliability of the presented results.',
                'comprehensive_subject_matter' => 'The subject matter is presented comprehensively, covering all relevant aspects and providing a clear context for the research.', 
                'applicable_and_sufficient_references' => 'The references are both applicable and sufficient, supporting the research and providing additional resources for readers.',
                'inappropriate_references' => 'All references appear to be relevant to the topic, and there are no inappropriate citations.',
                'comprehensive_application' => 'The application is comprehensive and well-detailed, offering a thorough understanding of how the research can be applied in real-world scenarios.',
                'grammar_and_presentation' => 'The grammar and presentation are acceptable, although there are some minor issues that could be improved.',
                'assumption_of_reader_knowledge' => 'The submission is quite technical, and it assumes a high level of reader knowledge. Providing more explanations for complex concepts would enhance accessibility.',
                'clear_figures_and_tables' => 'Figures and tables are clear and well-labeled, making it easy to interpret the data and results.',
                'adequate_explanations' => 'Explanations are generally adequate, but in some sections, additional clarification would enhance reader understanding.',
                'technical_or_methodological_errors' => 'No significant technical or methodological errors were identified in the paper. The research methods are robust',
                'reseach_project_name' => 'The project name is clear and reflects the research focus effectively.',
                'reseach_project_group' => 'The composition of the research project group is diverse and well-suited for the scope of the project.',
                'project_introduction' => 'The project introduction provides a strong foundation for the research and engages the reader effectively.',
                'project_aims_and_objectives' => 'The aims and objectives are well-defined and aligned with the research question.',
                'project_background' => 'The background section provides a comprehensive overview of existing research in the area.',
                'project_expected_research_contribution' => 'The expected research contribution is articulated clearly, demonstrating the project-s significance.',
                'project_proposed_methodology' => 'The proposed methodology is well-structured and suitable for addressing the research objectives.',
                'project_workplan' => 'The workplan is detailed and outlines the project-s timeline and milestones effectively.',
                'project_resources' => 'The resource allocation and budgeting are reasonable and well-documented.',
                'project_references' => 'The references in the project proposal are relevant and support the proposed research effectively.',
                'project_total_budget' => 'The total budget is well-justified and appears to cover all necessary expenses for the research project.',
                'other_comments' => 'The structure of the paper could be improved for better flow and coherence. Consider reorganizing some sections.',
                'review_decision' => 'Accepted with Revision',
            ],
            [
                'user_id' => 7,
                'project_id' => 1,
                'deadline' => '2023-11-10',
                'contribution_to_knowledge' => 'Yes, the paper makes a significant contribution to the existing body of knowledge in the field.',
                'technical_soundness' => 'Yes, the paper is technically sound and well-researched.',
                'comprehensive_subject_matter' => 'The subject matter is presented comprehensively, covering all essential aspects.', 
                'applicable_and_sufficient_references' => 'The references cited in the paper are relevant and provide a strong foundation for the research.',
                'inappropriate_references' => 'All references seem appropriate and relevant to the topic being discussed.',
                'comprehensive_application' => 'The application described in the paper is comprehensive and well-explained.',
                'grammar_and_presentation' => 'The paper-s grammar and presentation are satisfactory, but some minor proofreading is recommended for further improvement.',
                'assumption_of_reader_knowledge' => 'The paper may assume some prior knowledge, which could make it less accessible to readers without a deep understanding of the field.',
                'clear_figures_and_tables' => 'The figures and tables are clear and enhance the understanding of the content.',
                'adequate_explanations' => 'The explanations provided in the paper are generally clear and adequate, but there are a few areas where further clarification would be beneficial.',
                'technical_or_methodological_errors' => 'There are no significant technical or methodological errors detected in the paper.',
                'reseach_project_name' => 'The research project name is clear and reflects the paper-s content effectively.',
                'reseach_project_group' => 'The paper adequately describes the research project group and their roles in the study.',
                'project_introduction' => 'The introduction provides a good overview of the project-s objectives and sets the stage for the research.',
                'project_aims_and_objectives' => 'The aims and objectives of the project are well-defined and align with the research goals.',
                'project_background' => 'The background section provides a comprehensive context for the research, giving readers a clear understanding of the problem.',
                'project_expected_research_contribution' => 'The expected research contribution is clearly stated and aligns with the paper-s objectives.',
                'project_proposed_methodology' => 'The proposed methodology is well-explained and appears suitable for achieving the research goals.',
                'project_workplan' => 'The workplan outlines the project-s timeline and tasks effectively, ensuring a structured approach to the research.',
                'project_resources' => 'The allocation of resources is well-detailed, and it seems adequate for the research needs.',
                'project_references' => 'The references provided for the project are relevant and support the proposed research.',
                'project_total_budget' => 'The total budget estimation appears reasonable and aligned with the project-s requirements.',
                'other_comments' => 'A well-researched paper with valuable contributions to the field. However, minor improvements in presentation and some additional references could enhance its quality.',
                'review_decision' => 'Accepted with Revision',

            ],
            [
                'user_id' => 5,
                'project_id' => 2,
                'deadline' => '2023-11-10',
                'contribution_to_knowledge' => 'The paper-ss findings and insights add valuable information to the subject matter.',
                'technical_soundness' => 'The methodology and experiments conducted in the paper are robust and well-executed.',
                'comprehensive_subject_matter' => 'The paper provides a thorough and well-organized overview of the topic.', 
                'applicable_and_sufficient_references' => 'While the references are generally good, a few more recent sources could be included.',
                'inappropriate_references' => '',
                'comprehensive_application' => 'It covers various aspects and potential use cases effectively.',
                'grammar_and_presentation' => '',
                'assumption_of_reader_knowledge' => '',
                'clear_figures_and_tables' => 'The visuals aid in conveying information effectively.',
                'adequate_explanations' => '',
                'technical_or_methodological_errors' => '',

                'reseach_project_name' => '',
                'reseach_project_group' => '',
                'project_introduction' => '',
                'project_aims_and_objectives' => '',
                'project_background' => '',
                'project_expected_research_contribution' => '',
                'project_proposed_methodology' => '',
                'project_workplan' => '',
                'project_resources' => '',
                'project_references' => '',
                'project_total_budget' => '',

                'other_comments' => '',
                'review_decision' => 'Rejected',

            ],
            [
                'user_id' => 6,
                'project_id' => 2,
                'deadline' => '2023-11-10',
                'contribution_to_knowledge' => '',
                'technical_soundness' => '',
                'comprehensive_subject_matter' => '', 
                'applicable_and_sufficient_references' => '',
                'inappropriate_references' => '',
                'comprehensive_application' => '',
                'grammar_and_presentation' => '',
                'assumption_of_reader_knowledge' => '',
                'clear_figures_and_tables' => '',
                'adequate_explanations' => '',
                'technical_or_methodological_errors' => '',

                'reseach_project_name' => '',
                'reseach_project_group' => '',
                'project_introduction' => '',
                'project_aims_and_objectives' => '',
                'project_background' => '',
                'project_expected_research_contribution' => '',
                'project_proposed_methodology' => '',
                'project_workplan' => '',
                'project_resources' => '',
                'project_references' => '',
                'project_total_budget' => '',

                'other_comments' => '',
                'review_decision' => 'Rejected',

            ],
            [
                'user_id' => 2,
                'project_id' => 1,
                'deadline' => '2023-11-10',
                'contribution_to_knowledge' => ' The paper makes a significant contribution to the field by providing new insights into project name.',
                'technical_soundness' => 'The paper demonstrates a high level of technical competence and rigor.',
                'comprehensive_subject_matter' => 'The subject matter is presented comprehensively, covering all key aspects of [research_project_name].', 
                'applicable_and_sufficient_references' => 'The references provided are relevant and sufficient to support the research findings.',
                'inappropriate_references' => 'All references appear relevant to the topic, and there are no irrelevant citations.',
                'comprehensive_application' => 'The application of the research is thorough and comprehensive, addressing all key aspects of [research_project_name].',
                'grammar_and_presentation' => 'The grammar and presentation are acceptable, with only minor issues that do not significantly impact the overall quality of the paper.',
                'assumption_of_reader_knowledge' => 'The technical nature of the submission is well-justified and does not assume an excessive level of prior knowledge.',
                'clear_figures_and_tables' => 'Figures and tables are well-organized, clear, and aid in understanding the research.',
                'adequate_explanations' => 'Explanations provided in the paper are clear, concise, and effectively convey the research concepts.',
                'technical_or_methodological_errors' => 'No significant technical or methodological errors were identified in the paper.',

                'reseach_project_name' => 'The research project name is clearly defined, and its relevance is well-established.',
                'reseach_project_group' => 'The description of the research project group is informative and aligns with the overall research goals.',
                'project_introduction' => 'The introduction effectively sets the stage for the research and provides a clear context for the study.',
                'project_aims_and_objectives' => 'The aims and objectives of the project are well-defined and align with the research-s scope.',
                'project_background' => 'The background information is comprehensive and provides a strong foundation for the research.',
                'project_expected_research_contribution' => 'The expected research contribution is articulated well and aligns with the research project-s goals.',
                'project_proposed_methodology' => 'The proposed methodology is sound and appropriately chosen for addressing the research questions.',
                'project_workplan' => 'The workplan is well-structured and outlines a clear timeline for project completion.',
                'project_resources' => 'The allocation of resources is reasonable and supports the research project-s objectives.',
                'project_references' => 'The references provided are relevant, up-to-date, and support the research effectively.',
                'project_total_budget' => 'The total budget is reasonable and appears to be in line with the project-s scope and requirements.',

                'other_comments' => 'The paper is well-structured and effectively communicates the research objectives. However, further clarification is needed in the [specific aspect] section.',
                'review_decision' => 'Rejected',

            ],
            [
                'user_id' => 2,
                'project_id' => 2,
                'deadline' => '2023-11-10',
                'contribution_to_knowledge' => ' The paper makes a significant contribution to the field by providing new insights into project name.',
                'technical_soundness' => 'The paper demonstrates a high level of technical competence and rigor.',
                'comprehensive_subject_matter' => 'The subject matter is presented comprehensively, covering all key aspects of [research_project_name].', 
                'applicable_and_sufficient_references' => 'The references provided are relevant and sufficient to support the research findings.',
                'inappropriate_references' => 'All references appear relevant to the topic, and there are no irrelevant citations.',
                'comprehensive_application' => 'The application of the research is thorough and comprehensive, addressing all key aspects of [research_project_name].',
                'grammar_and_presentation' => 'The grammar and presentation are acceptable, with only minor issues that do not significantly impact the overall quality of the paper.',
                'assumption_of_reader_knowledge' => 'The technical nature of the submission is well-justified and does not assume an excessive level of prior knowledge.',
                'clear_figures_and_tables' => 'Figures and tables are well-organized, clear, and aid in understanding the research.',
                'adequate_explanations' => 'Explanations provided in the paper are clear, concise, and effectively convey the research concepts.',
                'technical_or_methodological_errors' => 'No significant technical or methodological errors were identified in the paper.',

                'reseach_project_name' => 'The research project name is clearly defined, and its relevance is well-established.',
                'reseach_project_group' => 'The description of the research project group is informative and aligns with the overall research goals.',
                'project_introduction' => 'The introduction effectively sets the stage for the research and provides a clear context for the study.',
                'project_aims_and_objectives' => 'The aims and objectives of the project are well-defined and align with the research-s scope.',
                'project_background' => 'The background information is comprehensive and provides a strong foundation for the research.',
                'project_expected_research_contribution' => 'The expected research contribution is articulated well and aligns with the research project-s goals.',
                'project_proposed_methodology' => 'The proposed methodology is sound and appropriately chosen for addressing the research questions.',
                'project_workplan' => 'The workplan is well-structured and outlines a clear timeline for project completion.',
                'project_resources' => 'The allocation of resources is reasonable and supports the research project-s objectives.',
                'project_references' => 'The references provided are relevant, up-to-date, and support the research effectively.',
                'project_total_budget' => 'The total budget is reasonable and appears to be in line with the project-s scope and requirements.',

                'other_comments' => 'The paper is well-structured and effectively communicates the research objectives. However, further clarification is needed in the [specific aspect] section.',
                'review_decision' => 'Rejected',

            ],
            [
                'user_id' => 5,
                'project_id' => 3,
                'deadline' => '2023-11-10',
                'contribution_to_knowledge' => 'The paper makes a significant contribution to the existing body of knowledge in the field. It offers a fresh perspective on the subject matter and presents valuable insights that can advance the understanding of the topic.',
                'technical_soundness' => 'Yes, the paper demonstrates a high level of technical soundness. The methodology and experiments conducted are well-structured and rigorously executed.',
                'comprehensive_subject_matter' => 'The subject matter is presented comprehensively, covering all essential aspects of the topic. The paper provides a thorough analysis and discussion.',
                'applicable_and_sufficient_references' => 'The references are both relevant and sufficient for supporting the paper\'s claims. The paper draws on a well-rounded set of sources to substantiate its arguments.',
                'inappropriate_references' => 'No, all the references cited in the paper are directly relevant to the topic under discussion. There are no references that appear out of place.',
                'comprehensive_application' => 'The application presented in the paper is comprehensive, addressing a wide range of practical scenarios and potential use cases. It demonstrates a strong understanding of real-world applications.',
                'grammar_and_presentation' => 'The grammar and presentation are generally of good quality, though there are a few minor errors. These do not significantly detract from the overall readability and understanding of the paper.',
                'assumption_of_reader_knowledge' => 'The paper is indeed highly technical, but the author has done a commendable job in providing adequate explanations and context, ensuring that it is accessible even to readers with a moderate level of technical knowledge.',
                'clear_figures_and_tables' => 'The figures and tables are well-organized and presented clearly, aiding in the understanding of the content. They enhance the overall quality of the paper.',
                'adequate_explanations' => 'The explanations provided in the paper are comprehensive and leave little room for ambiguity. They effectively convey complex concepts to the reader.',
                'technical_or_methodological_errors' => 'No significant technical or methodological errors were identified in the paper. The research methodology appears robust and well-executed.',
                'reseach_project_name' => 'The research project\'s title is clear and reflects the study\'s focus effectively. It provides a concise and accurate representation of the project\'s scope.',
                'reseach_project_group' => 'The research project group has been appropriately identified, and their roles and responsibilities are well-defined, ensuring a smooth collaboration.',
                'project_introduction' => 'The project introduction provides a solid foundation for understanding the research. It effectively sets the context and outlines the significance of the study.',
                'project_aims_and_objectives' => 'The project\'s aims and objectives are well-defined and align with the research problem. They provide a clear roadmap for the study.',
                'project_background' => 'The project background section offers a comprehensive overview of the relevant literature and contextualizes the research problem effectively.',
                'project_expected_research_contribution' => 'The expected research contribution is clearly stated and demonstrates the potential impact of the study on the field.',
                'project_proposed_methodology' => 'The proposed methodology is robust and well-detailed. It outlines the research approach, data collection methods, and analysis techniques clearly.',
                'project_workplan' => 'The project workplan is well-structured, with a clear timeline for various project milestones and tasks. It ensures efficient project management.',
                'project_resources' => 'The allocation of resources for the project is well-planned and adequately addresses the project\'s needs. It shows consideration for budget and equipment.',
                'project_references' => 'The list of references is comprehensive and well-cited, demonstrating a strong knowledge of existing literature relevant to the project.',
                'project_total_budget' => 'The total budget is well-justified and aligns with the project\'s scope and requirements. It demonstrates a clear understanding of the financial aspects of the project.',
                'other_comments' => 'The paper is a strong piece of research with valuable contributions to the field. It is well-organized and thoughtfully written. However, it could benefit from a more concise abstract and a clearer introduction.',
                'review_decision' => 'Accepted with Revision',

            ],
            [
                'user_id' => 6,
                'project_id' => 3,
                'deadline' => '2023-11-10',
                'contribution_to_knowledge' => 'Yes, the paper makes a valuable contribution to the existing body of knowledge by providing novel insights and findings.',
                'technical_soundness' => 'The paper is technically sound and demonstrates a strong understanding of the subject matter.',
                'comprehensive_subject_matter' => 'The subject matter is presented comprehensively, covering all relevant aspects and providing a clear understanding of the topic.',
                'applicable_and_sufficient_references' => 'The references provided are both applicable and sufficient to support the claims and arguments made in the paper.',
                'inappropriate_references' => 'No, all references appear to be relevant and appropriate for the topic.',
                'comprehensive_application' => 'The application is comprehensive and well-documented, ensuring that readers can understand and replicate the work.',
                'grammar_and_presentation' => 'While the grammar and presentation could be improved in some areas, it does not significantly detract from the overall quality of the paper.',
                'assumption_of_reader_knowledge' => 'The paper assumes a moderate level of technical knowledge, but it could benefit from providing more explanations for readers with less expertise in the field.',
                'clear_figures_and_tables' => 'The figures and tables are clear, well-labeled, and enhance the understanding of the content.',
                'adequate_explanations' => 'The explanations provided are generally adequate, but there are a few sections where more detailed explanations would improve clarity.',
                'technical_or_methodological_errors' => 'No technical or methodological errors were identified in the paper; it is well-executed.',
                'other_comments' => 'The paper is well-structured, and the arguments are logically presented. However, there is a need for more in-depth analysis in certain sections.',
                'review_decision' => 'Rejected',
            
                'reseach_project_name' => 'The research project-s title is clear and concise, effectively conveying the scope of the study.',
                'reseach_project_group' => 'The composition of the research project group is well-balanced, with expertise that aligns with the project-s objectives.',
                'project_introduction' => 'The introduction provides a good overview of the research project and its significance in the broader context.',
                'project_aims_and_objectives' => 'The aims and objectives of the research project are well-defined and align with the research goals.',
                'project_background' => 'The background section effectively sets the stage for the research, providing necessary context and motivation for the study.',
                'project_expected_research_contribution' => 'The expected research contribution is clearly stated, and it is an important addition to the field.',
                'project_proposed_methodology' => 'The proposed methodology is well-structured and appropriate for addressing the research questions.',
                'project_workplan' => 'The work plan outlines a feasible timeline for project execution and appears well-organized.',
                'project_resources' => 'The resources required for the project have been adequately identified and budgeted.',
                'project_references' => 'The list of references is comprehensive and relevant to the research project.',
                'project_total_budget' => 'The total budget for the research project appears reasonable and well-justified based on the proposed activities and resources.',
               

            ],
            [
                'user_id' => 8,
                'project_id' => 2,
                'deadline' => '2023-11-10',
                'contribution_to_knowledge' => null,
                'technical_soundness' => null,
                'comprehensive_subject_matter' => null, 
                'applicable_and_sufficient_references' => null,
                'inappropriate_references' => null,
                'comprehensive_application' => null,
                'grammar_and_presentation' => null,
                'assumption_of_reader_knowledge' => null,
                'clear_figures_and_tables' => null,
                'adequate_explanations' => null,
                'technical_or_methodological_errors' => null,

                'reseach_project_name' => null,
                'reseach_project_group' => null,
                'project_introduction' => null,
                'project_aims_and_objectives' => null,
                'project_background' => null,
                'project_expected_research_contribution' => null,
                'project_proposed_methodology' => null,
                'project_workplan' => null,
                'project_resources' => null,
                'project_references' => null,
                'project_total_budget' => null,

                'other_comments' => null,
                'review_decision' => null,

            ],
        ];

        foreach ($reviews as $reviewData) {
            Review::create($reviewData);
        }


    }
}
