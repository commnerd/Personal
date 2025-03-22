import { Injectable } from '@angular/core';

import { Subject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class LoadToggleService {

  private loadingCounter = 0;
  private stateSubject: Subject<boolean> = new Subject<boolean>();

  constructor() {}

  startLoading(): void {
    this.loadingCounter++;
    this.stateSubject.next(true);
  }

  finishLoading(): void {
    this.loadingCounter--;
    this.stateSubject.next(this.loadingCounter > 0);
  }

  state(): Subject<boolean> {
    return this.stateSubject;
  }
}