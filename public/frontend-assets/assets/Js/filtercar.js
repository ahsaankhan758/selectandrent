// $(document).ready(function() {
//     if ($('#brandDropdown').length > 0) {
//         $.ajax({
//             url: $('#brandDropdown').data('url'),
//             method: 'GET',
//             success: function(response) {
//                 console.log(response); 
//                 if (response.status) {
//                     // Populate Brands
//                     $('#brandDropdown').empty().append('<option disabled selected>Brand</option>');
//                     response.brands.forEach(function(brand) {
//                         $('#brandDropdown').append('<option value="' + brand.id + '">' + brand.name + '</option>');
//                     });

//                     // Populate Models
//                     $('#modelDropdown').empty().append('<option disabled selected>Model</option>');
//                     response.models.forEach(function(model) {
//                         $('#modelDropdown').append('<option value="' + model.id + '" data-brand="' + model.brand_id + '">' + model.name + '</option>');
//                     });

//                     // Populate Beams
//                     $('#beamDropdown').empty().append('<option disabled selected>Beam</option>');
//                     response.beams.forEach(function(beam) {
//                         $('#beamDropdown').append('<option value="' + beam + ' km">' + beam + ' km</option>');
//                     });

//                     // Populate Radius 
//                     $('#radiusDropdown').empty().append('<option disabled selected>Radius</option>');
//                     for (var i = 1; i <= 10; i++) {
//                         $('#radiusDropdown').append('<option value="' + i + '">' + i + '</option>');
//                     }

//                     // Populate Transmissions
//                     $('#transmissionDropdown').empty().append('<option disabled selected>Transmission</option>');
//                     response.transmissions.forEach(function(transmission) {
//                         $('#transmissionDropdown').append('<option value="' + transmission + '">' + transmission + '</option>');
//                     });

//                     // populate mileage
//                     var mileageOptions = [1000, 5000, 10000, 20000, 40000, 60000, 80000,100000];

//                     $('#minMileageDropdown').empty().append('<option value="" disabled selected hidden>Min</option>');
//                     $('#maxMileageDropdown').empty().append('<option value="" disabled selected hidden>Max</option>');
                    
//                     const labelOption = '<option disabled style="font-weight:bold;">Mileage</option>';
                    
//                     $('#minMileageDropdown').append(labelOption);
//                     $('#maxMileageDropdown').append(labelOption);
                    
//                     mileageOptions.forEach(function(value) {
//                         $('#minMileageDropdown').append('<option value="' + value + '">' + value + ' km</option>');
//                         $('#maxMileageDropdown').append('<option value="' + value + '">' + value + ' km</option>');
//                     });                    

//                     // Filter models by selected brand
//                     $('#brandDropdown').on('change', function() {
//                         var selectedBrandId = $(this).val();
//                         $('#modelDropdown option').each(function() {
//                             $(this).toggle($(this).data('brand') == selectedBrandId || !$(this).data('brand'));
//                         });
//                         $('#modelDropdown').val($('#modelDropdown option:visible:first').val()).trigger('change');
//                     });

//                     // Filter beams by selected model
//                     $('#modelDropdown').on('change', function() {
//                         var selectedModelId = $(this).val();
//                         $('#beamDropdown option').each(function() {
//                             $(this).toggle($(this).data('model') == selectedModelId || !$(this).data('model'));
//                         });
//                         $('#beamDropdown').val($('#beamDropdown option:visible:first').val());
//                     });

//                 } else {
//                     console.warn('Could not fetch data.');
//                 }
//             },
//             error: function(xhr) {
//                 console.warn('AJAX error occurred but safely ignored if not on the car search page.');
//             }
//         });
//     }
// });
