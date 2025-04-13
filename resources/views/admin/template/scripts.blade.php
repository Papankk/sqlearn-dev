<!-- Start::main-scripts -->

<!-- Scroll To Top -->
<div class="scrollToTop">
    <span class="arrow"><i class="ti ti-arrow-narrow-up fs-20"></i></span>
</div>
<div id="responsive-overlay"></div>
<!-- Scroll To Top -->

<!-- Popper JS -->
<script src="{{ asset('/assets/libs/%40popperjs/core/umd/popper.min.js') }}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Node Waves JS-->
<script src="{{ asset('/assets/libs/node-waves/waves.min.js') }}"></script>

<!-- Simplebar JS -->
<script src="{{ asset('/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('/assets/js/simplebar.js') }}"></script>

<!-- Auto Complete JS -->
<script src="{{ asset('/assets/libs/%40tarekraafat/autocomplete.js/autoComplete.min.js') }}"></script>

<!-- Color Picker JS -->
<script src="{{ asset('/assets/libs/%40simonwep/pickr/pickr.es5.min.js') }}"></script>

<!-- Date & Time Picker JS -->
<script src="{{ asset('/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<!-- End::main-scripts -->


<!-- Sales Dashboard -->
<script src="{{ asset('/assets/js/sales-dashboard.js') }}"></script>

<!-- Sticky JS -->
<script src="{{ asset('/assets/js/sticky.js') }}"></script>

<!-- Defaultmenu JS -->
<script src="{{ asset('/assets/js/defaultmenu.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('/assets/js/custom.js') }}"></script>

<!-- Custom-Switcher JS -->
<script src="{{ asset('/assets/js/custom-switcher.min.js') }}"></script>

<!-- Used In Zoomable TIme Series Chart -->
<script src="{{ asset('assets/js/dataseries.js') }}"></script>

<!---Used In Annotations Chart-->
<script src="{{ asset('assets/js/apexcharts-stock-prices.js') }}"></script>

<!-- Internal Apex Line Charts JS -->
<script src="{{ asset('assets/js/apexcharts-line.js') }}"></script>

<script src="{{ asset('assets/code.jquery.com/jquery-3.6.1.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('[id^=UpdateSoal]').each(function() {
            const modal = $(this);
            const soalId = modal.attr('id').replace('UpdateSoal', '');

            const tipeSelect = modal.find(`#tipe${soalId}`);
            const opsiWrapper = modal.find('.opsi-wrapper');
            const opsiContainer = modal.find(`#opsi-container${soalId}`);
            const jawabanText = modal.find(`#jawaban_text${soalId}`);
            const jawabanMCQ = modal.find(`#jawaban_mcq${soalId}`);
            const jawabanMultiple = modal.find(`#jawaban_multiple${soalId}`);

            function updateJawabanVisibility(tipe) {
                jawabanText.addClass('d-none');
                jawabanMCQ.addClass('d-none').prop('disabled', true);
                jawabanMultiple.addClass('d-none').prop('disabled', true);

                if (tipe === 'text') {
                    jawabanText.removeClass('d-none');
                } else if (tipe === 'mcq') {
                    jawabanMCQ.removeClass('d-none').prop('disabled', false);
                } else if (tipe === 'multiple') {
                    jawabanMultiple.removeClass('d-none').prop('disabled', false);
                }
            }

            function syncJawabanOptions() {
                const opsiValues = [];

                opsiContainer.find('input[name="opsi[]"]').each(function() {
                    const val = $(this).val().trim();
                    if (val !== '') {
                        opsiValues.push(val);
                    }
                });

                const selectedMcq = jawabanMCQ.val();
                jawabanMCQ.empty();
                opsiValues.forEach(opt => {
                    jawabanMCQ.append(
                        `<option value="${opt}" ${opt === selectedMcq ? 'selected' : ''}>${opt}</option>`
                    );
                });

                const selectedMultiple = jawabanMultiple.val() || [];
                jawabanMultiple.empty();
                opsiValues.forEach(opt => {
                    const selected = selectedMultiple.includes(opt) ? 'selected' : '';
                    jawabanMultiple.append(
                        `<option value="${opt}" ${selected}>${opt}</option>`);
                });
            }

            updateJawabanVisibility(tipeSelect.val());

            tipeSelect.on('change', function() {
                const tipe = $(this).val();
                if (tipe === 'mcq' || tipe === 'multiple') {
                    opsiWrapper.removeClass('d-none');
                } else {
                    opsiWrapper.addClass('d-none');
                }
                updateJawabanVisibility(tipe);
                syncJawabanOptions(); // refresh on tipe change
            });

            opsiContainer.on('click', '.add-opsi-btn', function() {
                const group = $(this).closest('.input-group');
                // Clone the group
                const newGroup = group.clone();
                // Clear the cloned input’s value and make sure its name is set correctly.
                newGroup.find('input.form-control')
                    .val('') // Clear any value
                    .attr('name', 'opsi[]'); // Ensure it has the correct name

                // Change the button from "add" to "remove"
                newGroup.find('button')
                    .removeClass('add-opsi-btn btn-outline-primary')
                    .addClass('remove-opsi-btn btn-outline-danger')
                    .text('−');

                // Append the new group to the opsi container
                opsiContainer.append(newGroup);

                // Optional: If you have a function to refresh the jawaban options, call it
                syncJawabanOptions();
            });

            opsiContainer.on('click', '.remove-opsi-btn', function() {
                $(this).closest('.input-group').remove();
                syncJawabanOptions();
            });

            opsiContainer.on('input', 'input[name="opsi[]"]', function() {
                syncJawabanOptions();
            });
        });
    });
</script>


<!-- Datatables Cdn -->
<script src="{{ asset('assets/cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js') }}"></script>

<!-- Internal Datatables JS -->
<script src="{{ asset('assets/js/datatables.js') }}"></script>

<!-- Prism JS -->
<script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>
<script src="{{ asset('assets/js/prism-custom.js') }}"></script>

<!-- Fileupload JS -->
<script src="{{ asset('assets/js/fileupload.js') }}"></script>

<script src="{{ asset('assets/js/toasts.js') }}"></script>
