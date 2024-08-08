import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import {first} from "rxjs";

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
      this.activatedRoute.queryParamMap.pipe(first()).subscribe( params => {
        if(params.has('jwt')) {
          localStorage.setItem('jwt', params.get('jwt') as string);
          setTimeout(() => window.location.href='/admin/', 0);
        }
      });
    }, 0);
  }
}
