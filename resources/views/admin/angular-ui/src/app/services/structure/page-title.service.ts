import { Injectable } from '@angular/core';

import { BehaviorSubject, Observable, Subject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PageTitleService {

  titleSubject = new BehaviorSubject<string>('');

  subscribe(): Observable<string> {
    return this.titleSubject;
  }

  set(title: string) {
    this.titleSubject.next(title);
  }

  constructor() { }
}
