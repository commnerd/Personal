import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PagesComponent } from './pages.component';
import { PartialsModule } from '../partials/partials.module';
import { ActivatedRoute, RouterModule } from '@angular/router';
import { NavigationComponent } from '../partials/navigation/navigation.component';

describe('PagesComponent', () => {
  let component: PagesComponent;
  let fixture: ComponentFixture<PagesComponent>;

  beforeEach(() => {
    let activatedRoute: ActivatedRoute;
    TestBed.configureTestingModule({
      imports: [RouterModule, PartialsModule],
      providers: [ActivatedRoute],
      declarations: [PagesComponent, NavigationComponent]
    });
    fixture = TestBed.createComponent(PagesComponent);
    TestBed.inject(ActivatedRoute);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
