import { Component } from '@angular/core';
import { map } from 'rxjs/operators';
import { Breakpoints, BreakpointObserver } from '@angular/cdk/layout';

import { DashboardCard } from '@models/structure/dashboard/card';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent {
  /** Based on the screen size, switch from standard to one column per row */
  cards = this.breakpointObserver.observe(Breakpoints.Handset).pipe(
    map(({ matches }) => {
      let cards: Array<DashboardCard> = [
        new DashboardCard(
          'System',
          `System running on linux`
        ),
        new DashboardCard(
          'Contact Messages',
          'You have 10 messages',
          [{ label: 'Manage', target: ['/', 'contact-messages' ] }]
        ),
        new DashboardCard(
          'Drinks',
          'You have 3 drinks',
          [{ label: 'Manage', target: ['#', 'drinks' ] }]
        ),
        new DashboardCard(
          'Quotes',
          'You have 5 quotes',
          [{ label: 'Manage', target: ['#', 'quotes' ] }]
        ),
      ]
      if (matches) {
        return cards;
      }

      for(let index in cards) {
        cards[index].cols = 1;
        if(index == "0") {
          cards[index].cols = 2;
        }
      }
      return cards;
    })
  );

  constructor(private breakpointObserver: BreakpointObserver) {}
}
