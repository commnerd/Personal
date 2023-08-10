import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ComposerComponent } from './composer.component';

describe('ComposerComponent', () => {
  let component: ComposerComponent;
  let fixture: ComponentFixture<ComposerComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [ComposerComponent]
    });
    fixture = TestBed.createComponent(ComposerComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
