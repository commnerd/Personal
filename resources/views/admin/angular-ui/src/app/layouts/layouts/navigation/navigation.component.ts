import { Component } from '@angular/core';
import { BreakpointObserver, Breakpoints } from '@angular/cdk/layout';
import { Observable } from 'rxjs';
import { map, shareReplay } from 'rxjs/operators';
import { Link } from '@models/structure/navigation/link';
import { PageTitleService } from '@services/structure/page-title.service';

@Component({
  selector: 'app-navigation',
  templateUrl: './navigation.component.html',
  styleUrls: ['./navigation.component.scss']
})
export class NavigationComponent {

  isHandset$: Observable<boolean> = this.breakpointObserver.observe(Breakpoints.Handset)
    .pipe(
      map(result => result.matches),
      shareReplay()
    );

  title$: Observable<string> = this.pageTitleService.subscribe().pipe(
    map(title => title != '' ? ` - ${title}` : '')
  );

  links: Array<Link> = [
    { label: "Contact Messages", target: [ "/", "contact-messages" ] },
    { label: "Drinks", target: [ "/", "drinks" ] },
    { label: "Quotes", target: [ "/", "quotes" ] },
  ];

  constructor(
    private breakpointObserver: BreakpointObserver,
    private pageTitleService: PageTitleService,
  ) {}

  isArray(itm: string | Array<string>) {
    return Array.isArray(itm);
  }

}
