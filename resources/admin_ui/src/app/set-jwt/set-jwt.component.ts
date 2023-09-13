import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-set-jwt',
  templateUrl: './set-jwt.component.html',
  styleUrls: ['./set-jwt.component.scss']
})
export class SetJwtComponent implements OnInit {

  constructor(
    private activatedRoute: ActivatedRoute
  ) {}

  ngOnInit(): void {
    setTimeout(() => {
      let paramSubscription = this.activatedRoute.queryParamMap.subscribe( params => {
        if(params.has('jwt')) {
          localStorage.setItem('jwt', params.get('jwt') as string);
          setTimeout(() => window.location.href='/admin/', 0);
        }
        setTimeout(() => paramSubscription.unsubscribe(), 0);
      });
    }, 0);
  }
}
