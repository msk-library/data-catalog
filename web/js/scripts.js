/*
 *
 *   This file is part of the Data Catalog project.
 *   Copyright (C) 2016 NYU Health Sciences Library
 *
 *   This program is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

jQuery(function($) {
 $(document).ready(function () {
  $('#collapsed-areas, #collapsed-authors').on('shown.bs.collapse', function() {
      $(this).siblings('a.collapsed-toggle').text('See less...');
  });
  $('#collapsed-areas, #collapsed-authors').on('hidden.bs.collapse', function() {
      $(this).siblings('a.collapsed-toggle').text('See more...');
  });

  // Only show first n number (max+ 1) of results for each facet on results page
  $('ul.facets-list').each(function(){
    var max = 4;
    if ($(this).find('li').length > max+1) {
        $(this).find('li:gt('+max+')').hide().end().append('<li class="more_facets"><span class="show_more">Show More&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-down"></span></span></li>');
    };
  });

  $('.more_facets').click( function(){
    var max = 4;
    $(this).siblings(':gt('+max+')').toggle();
    if ( $(this).is(':contains("More") ')) {
        $(this).html('<span class="show_less">Show Less</span>');
    } else {
        $(this).html('<span class="show_more">Show More&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-down"></span></span>');
    };
  });

  //hide geographic coverage facet for now
  $("h5:contains('Geographic')").parent().hide();

 });

});
