@extends('layouts.app')

@section('title', __('web.general.hireme'))
@section('body-class', 'text-white')

@section('content')
    <div class="d-flex flex-column min-vh-100 mb-0 pb-0">
        <div class="container">
            <h2 class="mb-4 text-center">{{ __('web.navigation.documentation') }}</h2>

            <div class="row">
                <!-- Left: Document Listing -->
                <div class="col-md-4">
                    <div class="accordion" id="documentAccordion">

                        {{-- Resume & Cover Letter --}}
                        @livewire('bookshelf-listing', [
                            'title' => 'web.section.resume_cover',
                            'documents' => [
                                [
                                    'title' => 'web.document.resume',
                                    'preview' => 'Eric_resume_082025.png',
                                    'download' => 'Eric_resume_082025.pdf',
                                ],
                                [
                                    'title' => 'web.document.cover_letter',
                                    'preview' => 'CoverLetter.png',
                                    'download' => 'CoverLetter.pdf',
                                ],
                            ],
                        ])
                    {{-- Academic Certificates --}}
                        @livewire('bookshelf-listing', [
                            'title' => 'web.section.academic_certificates',
                            'documents' => [
                                ['title' => 'web.document.integrity_transcript', 'preview' => 'cert/academic/integrity_transcript.png', 'download' => 'cert/academic/integrity_transcript.pdf'],
                                ['title' => 'web.document.penolong_ketua', 'preview' => 'cert/academic/penolong_ketua.png', 'download' => 'cert/academic/penolong_ketua.pdf'],
                                ['title' => 'web.document.phy_chem_report', 'preview' => 'cert/academic/phy_chem_report.png', 'download' => 'cert/academic/phy_chem_report.pdf'],
                                ['title' => 'web.document.quat_cert', 'preview' => 'cert/academic/quat_cert.png', 'download' => 'cert/academic/quat_cert.pdf'],
                                ['title' => 'web.document.sijil_berhenti_sekolah', 'preview' => 'cert/academic/sijil_berhenti_sekolah.png', 'download' => 'cert/academic/sijil_berhenti_sekolah.pdf'],
                                ['title' => 'web.document.sijil_pencapaian', 'preview' => 'cert/academic/sijil_pencapaian.png', 'download' => 'cert/academic/sijil_pencapaian.pdf'],
                                ['title' => 'web.document.surat_akaun', 'preview' => 'cert/academic/surat_akaun.png', 'download' => 'cert/academic/surat_akaun.pdf'],
                            ],
                        ])
             {{-- Academic Subcategory: Degree/School Certs --}}
                         @livewire('bookshelf-listing', [
                            'title' => 'web.section.academic_sub_certificates',
                            'documents' => [
                                ['title' => 'web.document.bachelor_cert', 'preview' => 'cert/academic/cert/bachelor_cert.png', 'download' => 'cert/academic/cert/bachelor_cert.pdf'],
                                ['title' => 'web.document.foundation_cert', 'preview' => 'cert/academic/cert/foundation_cert.png', 'download' => 'cert/academic/cert/foundation_cert.pdf'],
                                ['title' => 'web.document.spm_cert', 'preview' => 'cert/academic/cert/spm_cert_Page_1.png', 'download' => 'cert/academic/cert/spm_cert.pdf'],
                            ],
                        ])
                        {{-- Academic Subcategory: Languages --}}
                    @livewire('bookshelf-listing', [
                        'title' => 'web.section.academic_languages',
                        'documents' => [
                            ['title' => 'web.document.bahasa_9111', 'preview' => 'cert/academic/language/9111_Page_1.png', 'download' => 'cert/academic/language/9111.pdf'],
                            ['title' => 'web.document.lisan_bm', 'preview' => 'cert/academic/language/lisan_bm.png', 'download' => 'cert/academic/language/lisan_bm.pdf'],
                            ['title' => 'web.document.lisan_cn', 'preview' => 'cert/academic/language/lisan_cn.png', 'download' => 'cert/academic/language/lisan_cn.pdf'],
                            ['title' => 'web.document.lisan_en', 'preview' => 'cert/academic/language/lisan_en.png', 'download' => 'cert/academic/language/lisan_en.pdf'],
                            ['title' => 'web.document.muet', 'preview' => 'cert/academic/language/muet_Page_1.png', 'download' => 'cert/academic/language/muet.pdf'],
                        ],
                    ])

                                      {{-- Academic Subcategory: Results --}}
                                    @livewire('bookshelf-listing', [
                                        'title' => 'web.section.academic_results',
                                        'documents' => [
                                            ['title' => 'web.document.foundation_transcript', 'preview' => 'cert/academic/result/foundation_academic_transcript_Page_1.png', 'download' => 'cert/academic/result/foundation_academic_transcript.pdf'],
                                            ['title' => 'web.document.spm_slip', 'preview' => 'cert/academic/result/spm slip.png', 'download' => 'cert/academic/result/spm slip.pdf'],
                                            ['title' => 'web.document.statement_result', 'preview' => 'cert/academic/result/statementResult_2004772_Page_1.png', 'download' => 'cert/academic/result/statementResult_2004772.pdf'],
                                        ],
                                    ])

                              {{-- Co-Curricular --}}
                                @livewire('bookshelf-listing', [
                                    'title' => 'web.section.cocurricular',
                                    'documents' => [
                                        ['title' => 'web.document.blood_donor', 'preview' => 'cert/cocurricular/blood_donor.png', 'download' => 'cert/cocurricular/blood_donor.pdf'],
                                        ['title' => 'web.document.sijil_penhargaan_1', 'preview' => 'cert/cocurricular/sijil_penhargaan_1.png', 'download' => 'cert/cocurricular/sijil_penhargaan_1.pdf'],
                                        ['title' => 'web.document.sijil_penhargaan_primary_2', 'preview' => 'cert/cocurricular/sijil_penhargaan_primary_2.png', 'download' => 'cert/cocurricular/sijil_penhargaan_primary_2.pdf'],
                                        ['title' => 'web.document.taekwondo', 'preview' => 'cert/cocurricular/taekwondo.png', 'download' => 'cert/cocurricular/taekwondo.pdf'],
                                    ],
                                ])
                            </div>
                        </div>

                        <div class="col-md-1"></div>
                        <!-- Right: Preview -->
                            <div class="col-md-7">
                                <div class="scrollable-image-s">
                        <img id="preview"
                                         src="{{ route('preview', ['encoded' => base64_encode('Eric_resume_082025.png')]) }}"
                                         alt="{{ __('web.document.resume') }}"
                                         class="img-fluid">
                                </div>
                                <div>
                                    <a id="downloadLink"
                                       href="{{ route('download', ['encoded' => base64_encode('Eric_resume_082025.pdf')]) }}"
                                       class="btn btn-primary mt-3" target="_blank">
                                        {{ __('web.general.download') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('scripts')
    <script>
     function updatePreview(el) {
        startLoading();

        const preview = document.getElementById('preview');
        const downloadLink = document.getElementById('downloadLink');

        const previewUrl = el.getAttribute('data-preview');
        const alt = el.getAttribute('data-alt');
        const downloadUrl = el.getAttribute('data-download');
        const isPublic = el.getAttribute('data-public') === '1'; // 1 = public / whitelisted

        // Update download link immediately
        downloadLink.href = downloadUrl;

        // Show or hide download button based on login + whitelist
        @if(auth()->check())
            downloadLink.classList.remove('d-none');
        @else
            if (isPublic) {
                downloadLink.classList.remove('d-none');
            } else {
                downloadLink.classList.add('d-none');
            }
        @endif

        // Only stop loading after the image is loaded
        preview.onload = function() {
            stopLoading();
        };

        preview.src = previewUrl;
        preview.alt = alt;
    }


    </script>
@endpush
